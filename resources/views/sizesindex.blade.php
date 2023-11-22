@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container">
    <h1>TALLAS</h1>
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


    <table class="table" style="margin-top: 50px;"> <!-- Agregamos un margen superior -->
        <thead>
            <tr>
               
                <th>Tallas</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sizes as $sizes)
            <tr>
                <td>{{ $sizes->size_name }}</td>
                <td>
                    <div class="d-flex">
    <a href="/sizes/{{$sizes->id}}/editsize" class="btn custom-button">EDITAR</a>
    <form method="POST" action="{{ route('sizes.destroy', $sizes->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Seguro que quieres eliminar esta talla?')">ELIMINAR</button>
    </form>
</div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<div style="margin-top: 20px; margin-left: 120px;">
    <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
    <a href="{{ route('sizes.create') }}" class="btn custom-button">AGREGAR TALLA</a>

    {{-- Verificar si hay resultados de búsqueda para mostrar o no el botón de descarga de PDF --}}
   
</div>
@endsection
