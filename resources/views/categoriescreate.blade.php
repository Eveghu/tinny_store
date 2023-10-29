<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Categories Create')

@section('content')
<div class="container">
    <h1>AGREGAR CATEGORÍA</h1>
    <style>
        .custom-button {
          font-size: 14px; /* Reduce el tamaño de la fuente */
          background-color: #e7d8df; /* Cambia el color de fondo a tu elección */
          color: #fff; /* Cambia el color del texto a blanco */
          border: none;
          padding: 5px 10px; /* Añade un espacio interno al botón */
          border-radius: 5px; /* Añade bordes redondeados */
          transition: background-color 0.3s; /* Agrega una transición al color de fondo */
        }
      
        /* Estilo al pasar el mouse por encima (hover) */
        .custom-button:hover {
          background-color: #ff8bb4; /* Cambia el color de fondo al pasar el mouse */
        }
      </style>
      
    <form method="POST" action="/categories">
        @csrf

        <div class="mb-3">
            <label for="category_name">NOMBRE DE LA CATEGORÍA:</label>
            <input type="text" name="category_name" id="category_name" class="form-control">
        </div>


        <button type="submit" class="btn custom-button">GUARDAR</a>
        <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
        <a href="{{ route('categories.index') }}" class="btn custom-button">VER CATEGORÍAS</a>



    </form>
</div>
@endsection
