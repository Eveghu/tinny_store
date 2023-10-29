<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Products Create')

@section('content')
<div class="container">
    <h1>AGREGAR PRODUCTO</h1>
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
      
    <form method="POST" action="/products">
        @csrf

        <div class="mb-3">
            <label for="category_id">CATEGORÍA:</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="product_name">NOMBRE DEL PRODUCTO:</label>
            <input type="text" name="product_name" id="product_name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description">DESCRIPCIÓN:</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
      
        <div class="mb-3">
            <label for="color">COLOR:</label>
            <input type="text" name="color" id="color" class="form-control">
        </div>
       <!-- Agrega esta sección en tu formulario de creación y edición -->
<div class="mb-3">
    <label for="sizes">TALLAS:</label>
    <div class="row">
        <div class="col-2">
            <div class="form-check">
                <input type="checkbox" name="size[]" class="form-check-input" value="CH" id="size">
                <label class="form-check-label" for="size">CH</label>
            </div>
        </div>
        <div class="col-2">
            <div class="form-check">
                <input type="checkbox" name="size[]" class="form-check-input" value="M" id="size">
                <label class="form-check-label" for="size">M</label>
            </div>
        </div>
        <div class="col-2">
            <div class="form-check">
                <input type="checkbox" name="size[]" class="form-check-input" value="G" id="size">
                <label class="form-check-label" for="size">G</label>
            </div>
        </div>  
        <div class="col-2">
            <div class="form-check">
                <input type="checkbox" name="size[]" class="form-check-input" value="XG" id="size">
                <label class="form-check-label" for="size">XG</label>
            </div>
        </div><div class="col-2">
            <div class="form-check">
                <input type="checkbox" name="size[]" class="form-check-input" value="UNI" id="size">
                <label class="form-check-label" for="size">UNI</label>
            </div>
        </div>
      </div>
</div>
   
                <div class="row">
               <div class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="size[]" class="form-check-input" value="1" id="size">
                    <label class="form-check-label" for="size">1</label>
                </div>
            </div>    
             <div class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="size[]" class="form-check-input" value="3" id="size">
                    <label class="form-check-label" for="size">3</label>
                </div>
            </div>    
            <div class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="size[]" class="form-check-input" value="5" id="size">
                    <label class="form-check-label" for="size">5</label>
                </div>
            </div>    
            <div class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="size[]" class="form-check-input" value="7" id="size">
                    <label class="form-check-label" for="size">7</label>
                </div>
            </div>    
            <div class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="size[]" class="form-check-input" value="9" id="size">
                    <label class="form-check-label" for="size">9</label>
                </div>
            </div>    
            <div class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="size[]" class="form-check-input" value="11" id="size">
                    <label class="form-check-label" for="size">11</label>
                </div>
            </div>    
             
     
        </div>
    <div class="mb-3">
        <label for="assor_quant">CANTIDAD SURTIDA:</label>
        <input type="text" name="assor_quant" id="assor_quant" class="form-control">
    </div>
    <div class="mb-3">
        <label for="sold_quant">CANTIDAD VENDIDA:</label>
        <input type="text" name="sold_quant" id="sold_quant" class="form-control">
    </div>
    <div class="mb-3">
        <label for="total_quant">CANTIDAD TOTAL:</label>
        <input type="text" name="total_quant" id="total_quant" class="form-control">
    </div>
    <div class="mb-3">
        <label for="price">PRECIO:</label>
        <input type="text" name="price" id="price" class="form-control">
    </div>        



        <button type="submit" class="btn custom-button">GUARDAR</a>
        <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
        <a href="{{ route('products.index') }}" class="btn custom-button">VER PRODUCTOS</a>



    </form>
</div>
@endsection
