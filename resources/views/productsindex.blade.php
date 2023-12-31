@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container">
    <h1>PRODUCTOS</h1>
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
    <form action="{{ route('searchproduct') }}" method="GET" class="d-flex" role="search">
        <input type="search" name="query" placeholder="Buscar..." class="form-control me-2" >
        <button class="btn btn-outline-warning" type="submit">Buscar</button>
    </form>
    @if(isset($results) && count($results) > 0)

    <table class="table" style="margin-top: 50px;"> <!-- Agregamos un margen superior -->
        <thead>
            <tr>
                <th>Categoría</th>
                <th> Producto</th>
                <th>Descripción</th>
                <th>Tallas</th>
                <th>Sku</th>
                <th>Upc</th>
                <th>Cantidad Surtida</th>
                <th>Cantidad Vendida</th>
                <th>Cantidad Total</th>
                <th>Surtir</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $product)
            <tr>
                <td>{{ $product->category->category_name }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ implode(', ', explode(',', $product->size)) }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->upc }}</td>
                <td>{{ $product->assor_quant }}</td>
                <td>{{ $product->sold_quant }}</td>
                <td>{{ $product->total_quant }}</td>
                <td>
                    @if ($product->total_quant < 3)
                    <span class="badge bg-danger"> </span>
                    @elseif ($product->total_quant > 3)
                        <span class="badge bg-success"> </span>
                                            @endif
                </td>
                <td>
    <div class="d-flex">
        <a href="/products/{{$product->id}}/editproduct" class="btn custom-edit">EDITAR</a>
        <a href="/products/{{ $product->id }}" class="btn custom-button">DETALLES</a>
    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn custom-delete" onclick="return confirm('Seguro que quieres eliminar este producto?')">ELIMINAR</button>
    </form>
</div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else







    <table class="table" style="margin-top: 50px;"> <!-- Agregamos un margen superior -->
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Tallas</th>
                <th>Sku</th>
                <th>Upc</th>
                <th>Cantidad Surtida</th>
                <th>Cantidad Vendida</th>
                <th>Cantidad Total</th>
                <th>Surtir</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->category->category_name }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ implode(', ', explode(',', $product->size)) }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->upc }}</td>
                <td>{{ $product->assor_quant }}</td>
                <td>{{ $product->sold_quant }}</td>
                <td>{{ $product->total_quant }}</td>
                <td>
                    @if ($product->total_quant < 3)
                    <span class="badge bg-danger"> </span>
                    @elseif ($product->total_quant > 2)
                        <span class="badge bg-success"> 
                            
                        </span>
                                            @endif
                </td>

                <td>
                    <div class="d-flex">
                        <a href="/products/{{$product->id}}/editproduct" class="btn custom-edit">EDITAR</a>
                        <a href="/products/{{ $product->id }}" class="btn custom-button">DETALLES</a>
    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn custom-delete" onclick="return confirm('Seguro que quieres eliminar este producto?')">ELIMINAR</button>
    </form>
</div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
<div style="margin-top: 20px; margin-left: 120px;">
    <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
    <a href="{{ route('products.create') }}" class="btn custom-button">AGREGAR PRODUCTO</a>

    {{-- Verificar si hay resultados de búsqueda para mostrar o no el botón de descarga de PDF --}}
    @if(!isset($results) || count($results) === 0)
        <a href="{{ route('listaproduct.pdf') }}" class="btn custom-button">DESCARGAR PDF PRODUCTOS</a>
        <a href="{{ route('listasurtir.pdf') }}" class="btn custom-button">DESCARGAR PDF PRODUCTOS A SURTIR</a>

    @endif
</div>
@endsection
