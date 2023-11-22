<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

@extends('layouts.app')

@section('title', 'Sizes Form')

@section('content')
<div class="container">
        <h2>EDITAR TALLA</h2>
        <form method="POST" action="{{ route('sizes.update', $sizes->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="size_name" class="form-label">NOMBRE DE LA TALLA:</label>
                <input type="text" name="size_name" value="{{ $sizes->size_name }}" class="form-control{{ $errors->has('size_name') ? ' is-invalid' : '' }}">
                @error('size_name')
                    <div class="invalid-feedback" style="color: red;">
                        {{ $message }}
                    </div>

                       
                    
                    </div>
            
    @enderror
</div>
                
            </div>

            <!-- Agrega otros campos para la edición de la categoría aquí -->

            <div class="text-center">
                <button type="submit" class="btn custom-button">GUARDAR</button>
                <a href="{{ route('sizes.index') }}" class="btn custom-button">VER TALLAS</a>
                <a href="{{ route('home') }}" class="btn custom-button">VOLVER AL MENÚ</a>
            </div>
        </form>
   

</div>
@endsection
