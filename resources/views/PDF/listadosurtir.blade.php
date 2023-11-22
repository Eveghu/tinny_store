@extends('layouts.pdf')

@section('content')
    <style>
        /* CSS para centrar el título, cambiar el tipo de letra y hacer la letra más grande */
        .t {
            text-align: center; /* Centrar el título */
            font-family: 'Arial Black', sans-serif; /* Cambiar el tipo de letra a Arial Black */
            font-size: 30px; /* Tamaño de letra más grande, puedes ajustar el valor según tus preferencias */
            margin-top: 30px;
        }.header {
            text-align: center;
        }
        .header img {
            width: 200px; /* Ancho de la imagen */
            height: 100px; /* Alto de la imagen */
        }
        .header-text {
            text-align: right;
        }
    </style>
   <div class="header">
    <img src="images/logo.jpg" alt="Logo" width="100">      
</div>
    <p class="t"> LISTADO DE PRODUCTOS A SURTIR </p> <!-- Título centrado, con tipo de letra Arial Black y letra más grande -->
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Color</th>
                <th>Tallas</th>
                <th>Cantidad Surtida</th>
                <th>Cantidad Vendida</th>
                <th>Cantidad Total</th>
                <th>Precio</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($products as $product)
                @if ($product->total_quant < 3)
                    <tr>
                        <td>{{ $product->category->category_name }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->color }}</td>
                        <td>{{ implode(', ', explode(',', $product->size)) }}</td>
                        <td>{{ $product->assor_quant }}</td>
                        <td>{{ $product->sold_quant }}</td>
                        <td>{{ $product->total_quant }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection