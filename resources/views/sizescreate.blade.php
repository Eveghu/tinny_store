<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Products Create')

@section('content')
<div class="container">
    <h1>AGREGAR TALLA</h1>
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
      <form method="POST" action="/sizes">
        @csrf
        <div class="mb-3">
            <label for="type_id">TIPO DE TALLA:</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value="">Selecciona un tipo de talla</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="size_name" class="form-label">NOMBRE DE LA TALLA:</label>
            <input type="text" name="size_name" value="{{ old('size_name') }}" class="form-control{{ $errors->has('size_name') ? ' is-invalid' : '' }}">
            @error('size_name')
                <div class="invalid-feedback" style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn custom-button">GUARDAR</button>
        <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
        <a href="{{ route('sizes.index') }}" class="btn custom-button">VER TALLAS</a>
    </form>
</div>
@endsection