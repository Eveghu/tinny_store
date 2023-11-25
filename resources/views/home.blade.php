@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
    font-size: 48px;
    margin-top: 50px;
    font-family: "Arial", sans-serif; /* Cambia la fuente a Arial o a tu elección */
    font-weight: bold; /* Hace la fuente más gruesa (bold) */
}

.menu {
    display: flex;
    justify-content: center;
    list-style: none;
    margin-top: 20px;
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 20px;
    font-size: 24px; /* Aumentar el tamaño de la letra a 24px */
}

.menu .dropdown {
    margin: 0 100px; /* Añade margen izquierdo y derecho para separar los títulos */
}


.menu a {
    text-decoration: none;
    color: #333;
    margin: 0 10px; /* Reducido el espacio a la derecha del texto */
    font-size: 18px;
    border-radius: 50px;
}


        .menu a:hover {
            color: #f3609d;
        }

        img {
    margin-top: 20px;
    max-width: 50%; /* Reducido al 50% del ancho máximo */
    max-height: 50%; /* Reducido al 50% de la altura máxima */
    height: auto;
}


        .dropdown {
            position: relative;
            display: inline-block;
            margin: 0 20px;
        }

        .dropdown button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 18px; /* Reduje el tamaño de la letra del botón */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .box {
    background: #f9f9f9;
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    border-radius: 5px;
    background-color: #f1f0f0; /* Cambia el color de fondo a tu elección */
}

    </style>

    <body>
        <h1>TINNY TRENDY</h1>

        <div class="menu">
            <div class="dropdown">
                <button>CATEGORÍAS</button>
                <div class="dropdown-content box"> <!-- Agregamos la clase "box" para la caja -->
                  <a href="{{ route('categories.create') }}">Agregar Categoría</a>
                  <a href="{{ route('categories.index') }}"> Ver Categorías</a>
              </div>
              
            </div>

            <div class="dropdown">
                <button>PRODUCTOS</button>
                <div class="dropdown-content box"> <!-- Agregamos la clase "box" para la caja -->
                    <a href="{{ route('products.create') }}">Agregar Producto</a>
                    <a href="{{ route('products.index') }}">Ver Productos</a>
                </div>
            </div>
              <!--<div class="dropdown">
                    <button>TIPOS DE TALLA</button>
                <div class="dropdown-content box"> 
                    <a href="{{ route('types.create') }}">Agregar Tipo de Talla</a>
                    <a href="{{ route('types.index') }}">Ver Tipos de Talla</a>
                </div>
            </div>-->
           
            <div class="dropdown">
                <button>VENTAS</button>
                <div class="dropdown-content box"> <!-- Agregamos la clase "box" para la caja -->
                    <a href="{{ route('sells.create') }}">Agregar Venta</a>
                    <a href="{{ route('sells.index') }}">Ver Ventas</a>
                </div>
            </div>
        </div>

        <img src="{{ asset('images/img.jpeg') }}" class="img-fluid">
        <p style="font-size: 24px; font-weight: bold;">¡LA VIDA ES MUY CORTA COMO PARA NO VESTIRTE COMO QUIERAS !</p>

    </body>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>
<!-- Cliengo installation code for 127.0.0.1:8000 --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/65442630bc71c70032c73863/65442633bc71c70032c73866.js?platform=view_installation_code'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>

@endsection

