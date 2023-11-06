<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;
use PDF;
class CategoriesController extends Controller
{
    public function index(Request $request)
    {
       
        $query = $request->input('query');
    
        if ($query) {
            $results = Categories::search($query)->get();
            $categories=Categories::all();
            return view('categoriesindex', compact('categories', 'results'));
        } else {
            $categories=Categories::all();
            return view('categoriesindex', compact('categories'));
        }
    }

    public function create()
    {
        return view('categoriescreate');
    }

    public function store(Request $request)
    {
        
    $request->validate([
        'category_name' => 'required|string|max:20', // category_name es requerido y tiene un máximo de 20 caracteres
    ]);

    // Aquí continúa tu lógica para guardar el registro en la base de datos


        //return $request->all();
        $category = new Categories();
        $category -> category_name = $request -> input('category_name');
        $category -> save();
        return redirect()->route('categories.index');
    }



public function edit($id)
{
    $category = Categories::find($id);
    return view('editcategory', compact('category'));
}



public function update(Request $request, $id)
{
    $request->validate([
        'category_name' => 'required|string|max:20', // category_name es requerido y tiene un máximo de 20 caracteres
    ]);

    $category = Categories::find($id);

    if (!$category) {
        return redirect()->route('categories.index')->with('error', 'Category not found');
    }

    $category->category_name = $request->input('category_name');
    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category updated successfully');
}


    // ...


    public function destroy($id)
    {
        $category = Categories::find($id);
    
        if (!$category) {
            return redirect('/categories')->with('error', 'La categoría no existe o ya ha sido eliminado');
        }
    
        $category->delete();
    
        return redirect('/categories')->with('success', 'Categoría eliminada exitosamente');
    }
    
        // ...
    public function PDF()
    {
        $categories = categories::all();
        $pdf = PDF::loadview('pdf.listadocategories', compact('categories'));
        return $pdf->download('listadocategories.pdf');
    }
    
}
