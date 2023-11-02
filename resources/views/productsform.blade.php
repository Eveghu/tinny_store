<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Products Form')

@section('content')
<div class="container">
    @if(isset($product))
        <h2>EDITAR PRODUCTO</h2>
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @method('PUT')
    @else
        <h1>AGREGAR PRODUCTO</h1>
        <form method="POST" action="/products">
    @endif

        @csrf

        <div class="mb-3">
            <label for="category_id">CATEGORÍA:</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Selecciona una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product_name">NOMBRE DEL PRODUCTO:</label>
            <input type="text" name="product_name" value="{{ isset($product) ? $product->product_name : '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description">DESCRIPCIÓN:</label>
            <input type="text" name="description" value="{{ isset($product) ? $product->description : '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="color">COLOR:</label>
            <input type="text" name="color" value="{{ isset($product) ? $product->color : '' }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="sizes">TALLAS SELECCIONADAS:</label>
            <div class="row">
                <div class="col-2">
                 <div class="form-check">
                     <input type="checkbox" name="size[]" class="form-check-input" value="{{ $product->size }}" id="size" @if($product->sizeIsSelected($product->size)) checked @endif>
                     <label class="form-check-label" for="size">{{ $product->size }}</label>
                 </div>
                </div>     
        <div class="mb-3">
            <label for="sizes">TALLAS A SELECCIONAR:</label>
            <div class="row">
                <div class="col-2">
                    <div class="form-check">
                        <input type="checkbox" name="size[]" class="form-check-input" value="CH" id="size" {{ isset($product) && $product->sizeIsSelected('CH') ? 'checked' : '' }}>
                        <label class="form-check-label" for="size">CH</label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input type="checkbox" name="size[]" class="form-check-input" value="M" id="size" {{ isset($product) && $product->sizeIsSelected('M') ? 'checked' : '' }}>
                        <label class="form-check-label" for="size">M</label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input type="checkbox" name="size[]" class="form-check-input" value="G" id="size" {{ isset($product) && $product->sizeIsSelected('G') ? 'checked' : '' }}>
                        <label class="form-check-label" for="size">G</label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input type="checkbox" name="size[]" class="form-check-input" value="XG" id="size" {{ isset($product) && $product->sizeIsSelected('XG') ? 'checked' : '' }}>
                        <label class="form-check-label" for="size">XG</label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <input type="checkbox" name="size[]" class="form-check-input" value="UNI" id="size" {{ isset($product) && $product->sizeIsSelected('UNI') ? 'checked' : '' }}>
                        <label class="form-check-label" for="size">UNI</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-check">
                            <input type="checkbox" name="size[]" class="form-check-input" value="1" id="size" {{ isset($product) && $product->sizeIsSelected('1') ? 'checked' : '' }}>
                            <label class="form-check-label" for="size">1</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="checkbox" name="size[]" class="form-check-input" value="3" id="size" {{ isset($product) && $product->sizeIsSelected('3') ? 'checked' : '' }}>
                            <label class="form-check-label" for="size">3</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="checkbox" name="size[]" class="form-check-input" value="5" id="size" {{ isset($product) && $product->sizeIsSelected('5') ? 'checked' : '' }}>
                            <label class="form-check-label" for="size">5</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="checkbox" name="size[]" class="form-check-input" value="7" id="size" {{ isset($product) && $product->sizeIsSelected('7') ? 'checked' : '' }}>
                            <label class="form-check-label" for="size">7</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="checkbox" name="size[]" class="form-check-input" value="9" id="size" {{ isset($product) && $product->sizeIsSelected('9') ? 'checked' : '' }}>
                            <label class="form-check-label" for="size">9</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="checkbox" name="size[]" class="form-check-input" value="11" id="size" {{ isset($product) && $product->sizeIsSelected('11') ? 'checked' : '' }}>
                            <label class="form-check-label" for="size">11</label>
                        </div>
                    </div>
                <!-- Agrega más tallas aquí -->
            </div>
        </div>

        <div class="mb-3">
            <label for="assor_quant">CANTIDAD SURTIDA:</label>
            <input type="text" name="assor_quant" value="{{ isset($product) ? $product->assor_quant : '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="sold_quant">CANTIDAD VENDIDA:</label>
            <input type="text" name="sold_quant" value="{{ isset($product) ? $product->sold_quant : '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="total_quant">CANTIDAD TOTAL:</label>
            <input type="text" name="total_quant" value="{{ isset($product) ? $product->total_quant : '' }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="price">PRECIO:</label>
            <input type="text" name="price" value="{{ isset($product) ? $product->price : '' }}" class="form-control">
        </div>

        <button type="submit" class="btn custom-button">GUARDAR</button>
        <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
        <a href="{{ route('products.index') }}" class="btn custom-button">VER PRODUCTOS</a>
    </form>
</div>
@endsection
