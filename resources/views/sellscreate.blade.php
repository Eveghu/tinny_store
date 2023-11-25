<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Sells Create')

@section('content')
<div class="container">
    <h1>AGREGAR VENTA</h1>
    <style>
        .custom-button {
          font-size: 14px; /* Reduce el tamaño de la fuente */
          background-color: #ff8bb4; /* Cambia el color de fondo a tu elección */
          color: #fff; /* Cambia el color del texto a blanco */
          border: none;
          padding: 5px 10px; /* Añade un espacio interno al botón */
          border-radius: 5px; /* Añade bordes redondeados */
          transition: background-color 0.3s; /* Agrega una transición al color de fondo */
        }
      
        /* Estilo al pasar el mouse por encima (hover) */
        .custom-button:hover {
          background-color: #e7d8df; /* Cambia el color de fondo al pasar el mouse */
        }
    </style>

    <form method="POST" action="/sells">
        @csrf
        <div class="mb-3">
            <label for="product_id">PRODUCTO:</label>
            <select name="product_id" id="product_id" class="form-control">
                <option value="">Selecciona un producto</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>
       
        <div class="mb-3">
            <label for="amount" class="form-label">CANTIDAD:</label>
            <input type="text" name="amount" id="amount" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" value="{{ old('amount') }}">
            @error('amount')
            <div class="invalid-feedback" style="color: red;">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="date">FECHA:</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <button type="submit" class="btn custom-button">GUARDAR</button>
        <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
        <a href="{{ route('sells.index') }}" class="btn custom-button">VER VENTAS</a>
    </form>
</div>
@endsection

