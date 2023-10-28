<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
@extends('layouts.app')
@section('title', 'Categories Edit')
@section('content')
<style>
    .custom-button {
      font-size: 14px; /* Reduce el tamaño de la fuente */
      background-color: #e7d8df; /* Cambia el color de fondo a tu elección */
      color: #fff; /* Cambia el color del texto a blanco */
      border: none;
      padding: 5px 10px; /* Añade un espacio interno al botón */
      border-radius: 5px; /* Añade bordes redondeados */
      transition: background-color 0.3s; /* Agrega una transición al color de fondo */
  
      /* Estilo al pasar el mouse por encima (hover) */
      &:hover {
          background-color: #ff8bb4; /* Cambia el color de fondo al pasar el mouse */
      }
  }
  </style>
<div class="container">
    <h2>EDITAR CATEGORÍA</h2>
    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="category_name" class="form-label">Nombre de la Categoría:</label>
            <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control">
        </div>
       
        <!-- Agrega otros campos para la edición de la blusa aquí -->
        <div class="text-center">
            <button type="submit" class="btn custom-button">GUARDAR</button>
                  <a href="{{ route('categories.create') }}" class="btn custom-button">AGREGAR CATEGORÍA</a>
                  <a href="{{ route('categories.index') }}" class="btn custom-button">VER CATEGORÍAS</a>
                  <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>


        </div>
    </form>
</div>
@endsection

