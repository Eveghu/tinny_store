@extends('layouts.pdf')

@section('content')
    <style>
        /* CSS para centrar el título, cambiar el tipo de letra y hacer la letra más grande */
        .t {
            text-align: center; /* Centrar el título */
            font-family: 'Arial Black', sans-serif; /* Cambiar el tipo de letra a Arial Black */
            font-size: 30px; /* Tamaño de letra más grande, puedes ajustar el valor según tus preferencias */
            margin-top: 30px;

        }
        .header {
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
    <p class="t"> LISTADO DE VENTAS </p> <!-- Título centrado, con tipo de letra Arial Black y letra más grande -->
    <table class="table table-hover table-striped">
        <thead>
           <tr>
            <th>ID</th>
            <th>Nombre del Producto</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Fecha</th>
                    </tr> 
        </thead>
        <tbody>
            @foreach ($sells as $sell)
                <tr>
                    <td>{{ $sell->id }}</td>
                    <td>{{ $sell->product->product_name }}</td>
                    <td>{{ $sell->product->description }}</td>
                    <td>{{ $sell->amount }}</td>
                    <td>{{ $sell->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
