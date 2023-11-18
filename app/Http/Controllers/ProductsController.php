<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use PDF;
class ProductsController extends Controller
{
    public function index(Request $request)
    {
        
        $query = $request->input('query');
    
        if ($query) {
            $results = Products::search($query)->get();
            $products = Products::with('category')->get();
            return view('productsindex', compact('products', 'results'));
        } else {
            $products = Products::with('category')->get();
            return view('productsindex', compact('products'));
        }
    }
    

    public function create()
    {
        $product = new Products(); // Crea una nueva instancia del modelo de Producto o consulta un producto existente desde la base de datos.
        $categories = Categories::all(); // Reemplaza 'Category' con el modelo de tus categorías.
        return view('productscreate', compact('product', 'categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:30',
            'description' => 'required|string|max:45',
            'color' => 'required|string|max:45',
            'sku' => 'required|string|max:8',
            'upc' => 'required|string|max:12',
            'assor_quant' => 'required|integer',
            'sold_quant' => 'required|integer',
            'total_quant' => 'required|integer',
            'price' => 'required|numeric|between:0.01,999999.99', // Numeric value with 2 decimal places.
        ]);
        
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
        $product -> sku = $request -> input('sku');
        $product -> upc = $request -> input('upc');
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
        'product_name' => 'required|string|max:30',
        'description' => 'required|string|max:45',
        'color' => 'required|string|max:45',
        'assor_quant' => 'required|integer',
        'sold_quant' => 'required|integer',
        'total_quant' => 'required|integer',
        'price' => 'required|numeric|between:0.01,999999.99', // Numeric value with 2 decimal places.
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
    $product -> price = $request -> input('sku');
    $product -> price = $request -> input('upc');
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
