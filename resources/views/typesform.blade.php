<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Types Form')

@section('content')
<div class="container">
    @if(isset($type))
        <h2>EDITAR TIPO DE TALLA</h2>
        <form method="POST" action="{{ route('types.update', $type->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="type_name" class="form-label">NOMBRE DEL TIPO DE TALLA:</label>
                <input type="text" name="type_name" value="{{ $type->type_name }}" class="form-control{{ $errors->has('type_name') ? ' is-invalid' : '' }}">
                @error('type_name')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>

                       
                    
                    </div>
            
    @enderror
</div>
                
            </div>

            <!-- Agrega otros campos para la edición de la categoría aquí -->

            <div class="text-center">
                <button type="submit" class="btn custom-button">GUARDAR</button>
                <a href="{{ route('types.index') }}" class="btn custom-button">VER TIPOS DE TALLA</a>
                <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
            </div>
        </form>
    @else
        <h1>AGREGAR TIPO DE TALLA</h1>
        <form method="POST" action="/types" enctype= "multipart/form-data">
            @csrf

            <div class="mb-3">
                {!! Form::label('type_name', 'NOMBRE DEL TIPO DE TALLA:', ['class' => 'form-label']) !!}
                {!! Form::text('type_name', old('type_name'), ['class' => 'form-control'.($errors->has('type_name') ? ' is-invalid' : '')]) !!}
                @error('type_name')
                <div class="invalid-feedback" style="color: red;">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn custom-button">GUARDAR</button>
            <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
            <a href="{{ route('types.index') }}" class="btn custom-button">VER TIPOS DE TALLA</a>
        </form>
    @endif
</div>
@endsection
