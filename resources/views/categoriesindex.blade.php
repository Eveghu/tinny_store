@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container">
    <h1>CATEGORÍAS</h1>
    <style>
   .custom-button {
        background-color: #ff8bb4; /* Cambia el color de fondo a tu elección */
        color: #fff; /* Cambia el color del texto a blanco */
        border: none;
        padding: 5px 10px; /* Añade un espacio interno al botón */
        border-radius: 5px; /* Añade bordes redondeados */
        transition: background-color 0.3s; /* Agrega una transición al color de fondo */
    
        /* Estilo al pasar el mouse por encima (hover) */
        &:hover {
            background-color: #e7d8df; /* Cambia el color de fondo al pasar el mouse */
        }
    }
        .custom-delete {
          font-size: 14px; /* Reduce el tamaño de la fuente */
          background-color: rgb(218, 80, 92); /* Cambia el color de fondo a tu elección */
          color: #fff; /* Cambia el color del texto a blanco */
          border: none;
          padding: 5px 10px; /* Añade un espacio interno al botón */
          border-radius: 5px; /* Añade bordes redondeados */
          transition: background-color 0.3s; /* Agrega una transición al color de fondo */
        }
        .custom-edit {
            font-size: 14px; /* Reduce el tamaño de la fuente */
        background-color: rgb(90, 163, 118); /* Cambia el color de fondo a tu elección */
        color: #fff; /* Cambia el color del texto a blanco */
        border: none;
        padding: 5px 10px; /* Añade un espacio interno al botón */
        border-radius: 5px; /* Añade bordes redondeados */
        transition: background-color 0.3s; /* Agrega una transición al color de fondo */
    
        /* Estilo al pasar el mouse por encima (hover) */
        &:hover {
            background-color: #e7d8df; /* Cambia el color de fondo al pasar el mouse */
        }
        }
    </style>
    <form action="{{ route('searchcategory') }}" method="GET" class="d-flex" role="search">
        <input type="search" name="query" placeholder="Buscar..." class="form-control me-2" >
        <button class="btn btn-outline-warning" type="submit">Buscar</button>
    </form>
    @if(isset($results) && count($results) > 0)
    <div class="row mt-4">
        @foreach ($results as $category)
        <div class="card" style="margin-top: 20px; margin-right: 20px; width: 200px;">
            <div class="card-body">
                @if($category->image_category)
                            <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;"
                                class="card-img-top rounded-circle mx-auto d-block"
                                src="{{ asset('image_category/'.$category->image_category) }}" alt="">
                            @endif
                <h6 class="card-subtitle mb-2 text-muted">{{ $category->category_name }}</h6>
                <div class="d-flex justify-content-around">
                    <a href="/categories/{{$category->id}}/editcategory" class="custom-edit">EDITAR</a>
                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Seguro que quieres eliminar esta categoría?')">ELIMINAR</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div style="margin-top: 20px; margin-left: 450px;">
        <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
        <a href="{{ route('categories.create') }}" class="btn custom-button">AGREGAR CATEGORÍA</a>
    </div>
          
            @else
            <div class="row mt-4">
                @foreach ($categories as $category)
                    <div class="card" style="margin-top: 20px; margin-right: 20px; width: 200px;">
                        <div class="card-body">
                            @if($category->image_category)
                                <?php
                                    $image_category = public_path('image_category/' . $category->image_category);
                                ?>
                                @if(file_exists($image_category) && is_file($image_category))
                                    <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;"
                                        class="card-img-top rounded-circle mx-auto d-block"
                                        src="{{ asset('image_category/'.$category->image_category) }}" alt="">
                                @else
                                    <p>La imagen no está disponible.</p>
                                @endif
                            @endif
            
                        </div>
                    </div>
                @endforeach
            
                <div style="margin-top: 20px; margin-left: 300px;">
                    <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
                    <a href="{{ route('categories.create') }}" class="btn custom-button">AGREGAR CATEGORÍA</a>
                    @if(!isset($results) || count($results) === 0)
                        <a href="{{ route('listacategory.pdf') }}" class="btn custom-button">DESCARGAR PDF</a>
                    @endif
                </div>
            </div>
            
            @endsection