<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Categories Form')

@section('content')
<div class="container">
    @if(isset($category))
        <h2>EDITAR CATEGORÍA</h2>
        <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
                {{ Form::label('category_name', 'NOMBRE DE LA CATEGORÍA:', ['class' => 'form-label']) }}
                {!! Form::text('category_name', $category->category_name ?? old('category_name'), ['class' => 'form-control'.($errors->has('category_name') ? ' is-invalid' : '')]) !!}
                @error('category_name')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('image_category', 'IMAGEN DE LA CATEGORÍA:', ['class' => 'form-label']) }}
                @if(isset($category) && $category->image_category)
                    <img src="{{ asset('image_category/' . $category->image_category) }}" alt="Imagen de la categoría" style="max-width: 200px; max-height: 200px; margin-bottom: 20px;">
                @endif
                {{ Form::file('image_category', ['class' => 'form-control' . ($errors->has('image_category') ? ' is-invalid' : '')]) }}
                @error('image_category')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
                
            </div>


            <div class="text-center">
                <button type="submit" class="btn custom-button">GUARDAR</button>
                <a href="{{ route('categories.create') }}" class="btn custom-button">AGREGAR CATEGORÍA</a>
                <a href="{{ route('categories.index') }}" class="btn custom-button">VER CATEGORÍAS</a>
                <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
            </div>
        </form>
    @else
        <h1>AGREGAR CATEGORÍA</h1>
        <form method="POST" action="/categories" enctype= "multipart/form-data">
            @csrf

            <div class="mb-3">
                {!! Form::label('category_name', 'NOMBRE DE LA CATEGORÍA:', ['class' => 'form-label']) !!}
                {!! Form::text('category_name', old('category_name'), ['class' => 'form-control'.($errors->has('category_name') ? ' is-invalid' : '')]) !!}
                @error('category_name')
                <div class="invalid-feedback" style="color: red;">
                    {{ $message }}
                </div>
                @enderror
                <div class="col-md-6">
                    {{ Form::label('image_category', 'IMAGEN DE LA CATEGORÍA:', ['class' => 'form-label']) }}
                    {{ Form::file('image_category', ['class' => 'form-control' . ($errors->has('image_category') ? ' is-invalid' : '')]) }}
                
                </div>
            </div>

            <button type="submit" class="btn custom-button">GUARDAR</button>
            <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
            <a href="{{ route('categories.index') }}" class="btn custom-button">VER CATEGORÍAS</a>
        </form>
    @endif
</div>
@endsection
