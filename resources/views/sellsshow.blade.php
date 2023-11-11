@extends('layouts.app')
@section('title', 'Sells')
@section('content')
<h1 style="text-align: center;">DETALLE DE VENTA</h1>

<div class="card text-center" style="width: 18rem; margin: 70px auto;">
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
    <div class="card-body">
        <h5 class="card-title">ID VENTA: {{$sell->id}}</h5>
        <p class="card-text">CATEGORÍA: {{ $sell->product->category->category_name }}</p>
        <p class="card-text">NOMBRE DEL PRODUCTO: {{ $sell->product->product_name }}</p>
        <p class="card-text">DESCRIPCIÓN: {{ $sell->product->description }}</p>
        <p class="card-text">PRECIO UNITARIO: {{ $sell->product->price }}</p>
        <p class="card-text">CANTIDAD VENDIDA: {{$sell->amount}}</p>
        @php
    // Calcula el costo total multiplicando el precio unitario por la cantidad vendida
    $costoTotal = $sell->product->price * $sell->amount;
@endphp

<p class="card-text">COSTO TOTAL: $ {{ $costoTotal }}</p>
        <p class="card-text">FECHA: {{$sell->date}}</p>
</div>
</div>
<div class="text-center mt-5">
  <a href="{{ route('home') }}" class="btn custom-button mr-2">VOLVER AL MENÚ</a>
  <a href="{{ route('sells.create') }}" class="btn custom-button mr-2">AGREGAR VENTA</a>
  <a href="{{ route('sells.index') }}" class="btn custom-button">VER VENTAS</a>
</div>

@endsection
