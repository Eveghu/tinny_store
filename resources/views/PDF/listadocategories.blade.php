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
    <p class="t"> LISTADO DE CATEGORÍAS </p> <!-- Título centrado, con tipo de letra Arial Black y letra más grande -->
    <table class="table table-hover table-striped">
        <thead>
           <tr>
            <th>Nombre de la Categoría</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->category_name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
