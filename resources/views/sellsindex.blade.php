@extends('layouts.app')

@section('title', 'Sells')

@section('content')
<div class="container">
    <h1>VENTAS</h1>
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
   <form action="{{ route('searchsell') }}" method="GET" class="d-flex" role="search">
    <input type="search" name="query" placeholder="Buscar..." class="form-control me-2" >
    <button class="btn btn-outline-warning" type="submit">Buscar</button>
</form>
@if(isset($results) && count($results) > 0)


    <table class="table" style="margin-top: 50px;"> <!-- Agregamos un margen superior -->
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Costo Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $sell)
            <tr>
                <td>{{ $sell->date }}</td>

                <td>{{ $sell->product->product_name }}</td>
                <td>{{ $sell->product->description }}</td>
                <td>{{ $sell->amount }}</td>
                @php
                // Calcula el costo total multiplicando el precio unitario por la cantidad vendida
                $costoTotal = $sell->product->price * $sell->amount;
            @endphp

            <td>{{ $costoTotal }}</td>
                
                <td>    
                <a href="/sells/{{ $sell->id }}" class="btn custom-button">DETALLES</a>
                <tr>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else




    <table class="table" style="margin-top: 50px;"> <!-- Agregamos un margen superior -->
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Costo Total</th>
                <th>Opciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($sells as $sell)
            <tr>
                <td>{{ $sell->date }}</td>

                <td>{{ $sell->product->product_name }}</td>
                <td>{{ $sell->product->description }}</td>
                <td>{{ $sell->amount }}</td>
                @php
                // Calcula el costo total multiplicando el precio unitario por la cantidad vendida
                $costoTotal = $sell->product->price * $sell->amount;
            @endphp

            <td>{{ $costoTotal }}</td>
                <td>    <a href="/sells/{{ $sell->id }}" class="btn custom-button">DETALLES</a>
                <tr>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
<div style="margin-top: 20px; margin-left: 120px;">
    <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
    <a href="{{ route('sells.create') }}" class="btn custom-button">AGREGAR VENTA</a>

    {{-- Verificar si hay resultados de búsqueda para mostrar o no el botón de descarga de PDF --}}
    @if(!isset($results) || count($results) === 0)
        <a href="{{ route('listasell.pdf') }}" class="btn custom-button">DESCARGAR PDF</a>
    @endif
</div>
@endsection
