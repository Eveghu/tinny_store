@extends('layouts.app')
@section('title', 'Products')
@section('content')
<h1 style="text-align: center;">DETALLES DE PRODUCTO</h1>

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
        <h5 class="card-title">{{$product->product_name}}</h5>
        <p class="card-text">ID PRODUCTO: {{$product->id}}</p>
        <p class="card-text">CATEGORÍA: {{ $product->category->category_name }}</p>
        <p class="card-text">DESCRIPCIÓN: {{$product->description}}</p>
        <p class="card-text">COLOR: {{$product->color}}</p>
        <p class="card-text">TIPO DE TALLA: {{ $product->type->type_name }}</p>
        <p class="card-text">TALLA: {{$product->size}}</p>
        <p class="card-text">SKU: {{$product->sku}}</p>
        <p class="card-text">UPC: {{$product->upc}}</p>
        <p class="card-text">CANTIDAD SURTIDA: {{$product->assor_quant}}</p>
        <p class="card-text">CANTIDAD VENDIDA: {{$product->sold_quant}}</p>
        <p class="card-text">CANTIDAD TOTAL: {{$product->sold_quant}}</p>
        <p class="card-text">PRECIO ${{$product->price}}</p>
        <form method="POST" action="{{ url('products/delete', ['id' => $product->id]) }}">
          @csrf
            <button type="submit" class="btn custom-button">ELIMINAR</button>
        </form>
       <a href="/products/{{$product->id}}/editproduct" class="btn custom-button">EDITAR</a>
    </div>
</div>
<div style="margin-top: 0px; width: 18rem; margin: 70px auto;">
  <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
  <div style="text-align: right; margin-top: -32px; margin-right: -40px;">
    <a href="{{ route('products.create') }}" class="btn custom-button">AGREGAR PRODUCTO</a>
  </div>
  
  <div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('products.index') }}" class="btn custom-button">VER PRODUCTOS</a>
</div>
</div>
@endsection

