<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use PDF;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $categories = Categories::all(); // Reemplaza 'Category' con el nombre de tu modelo de categorías
        return view('productsindex', compact('products', 'categories'));
    }
    

    public function create()
    {
        $categories = Categories::all(); // Reemplaza 'Category' con el modelo de tus categorías.
        return view('productscreate', compact('categories'));
    }
    

    public function store(Request $request)
    {
        //return $request->all();
        $product = new Products();
        $product->category_id = $request->input('category_id'); // Asigna la categoría
        $product -> product_name = $request -> input('product_name');
        $product -> description = $request -> input('description');
        $product -> color = $request -> input('color');
        $product -> assor_quant = $request -> input('assor_quant');
        $product -> sold_quant = $request -> input('sold_quant');
        $product -> total_quant = $request -> input('total_quant');
        $product -> price = $request -> input('price');
        $product->size = implode(',', $request->input('size'));
        $product -> save();
        return redirect()->route('products.index');
    }


    public function show(Products $product)
{
    return view('productosshow', compact('product'));
}

    public function edit($id)
{
    $categories = Categories::all(); // Asegúrate de obtener las categorías aquí
    $product = Products::find($id);
    return view('editproduct', compact('product', 'categories'));

}



public function update(Request $request, $id)
{
    $request->validate([
        'product_name' => 'required',
        'description' => 'required',
        'color' => 'required',
        'size' => 'required',
        'assor_quant' => 'required|numeric',
        'sold_quant' => 'required|numeric',
        'total_quant' => 'required|numeric',
        'price' => 'required|numeric',

    ]);

    $product = Products::find($id);

    if (!$product) {
        return redirect()->route('products.index')->with('error', 'Product not found');
    }

    $product -> product_name = $request -> input('product_name');
    $product -> description = $request -> input('description');
    $product -> color = $request -> input('color');
    $product -> assor_quant = $request -> input('assor_quant');
    $product -> sold_quant = $request -> input('sold_quant');
    $product -> total_quant = $request -> input('total_quant');
    $product -> price = $request -> input('price');
    $product->size = implode(',', $request->input('size')); // Almacena tallas como una cadena

    $product -> save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}


    // ...


    public function destroy($id)
    {
        $product = Products::find($id);
    
        if (!$product) {
            return redirect('/products')->with('error', 'El producto no existe o ya ha sido eliminado');
        }
    
        $product->delete();
    
        return redirect('/products')->with('success', 'Producto eliminado exitosamente');
    }
    
        // ...
        public function PDF()
        {
            $products = products::all();
            $pdf = PDF::loadview('pdf.listadoproducts', compact('products'));
            return $pdf->download('listadoproducts.pdf');
        }
    
    
}
