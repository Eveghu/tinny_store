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
        $messages = [
            'category_name.required' => 'El nombre de la categoría es obligatorio y deben ser 20 caracteres.',   
        ];
        
        $this->validate($request, [
            'category_name' => 'required|string|max:20',
    
        ], $messages); 
        

        //return $request->all();
        $category = new Categories();
        $category -> category_name = $request -> input('category_name');
        if ($request->hasFile('image_category')) {
            $image_category = time() . '.' . $request->image_category->extension(); // Cambiar "$request->image" a "$request->imagen_equipo"
            $request->image_category->move(public_path('image_category'), $image_category);
            $category->image_category=$image_category;
    }        
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
        'category_name' => 'required|string|max:20', 

    ]);

    $category = Categories::find($id);

    if (!$category) {
        return redirect()->route('categories.index')->with('error', 'Category not found');
    }
    $category -> category_name = $request -> input('category_name');

    if ($request->hasFile('image_category')) {
        // Eliminar la imagen anterior si existe
        if ($category->image_category) {
            $image_category = public_path('image_category/') . $category->image_category;
            if (file_exists($image_category)) {
                unlink($image_category);
            }
        }

        $image_category = time() . '.' . $request->image_category->extension();
        $request->image_category->move(public_path('image_category'), $image_category);

        $category->image_category = $image_category; 
    }
    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category updated successfully');
}



    public function destroy($id)
    {
        $category = Categories::find($id);
        $image_category = public_path('image_category/' . $category->image_category); // Ruta a la imagen en el sistema de archivos
        if (file_exists($image_category)) {
            unlink($image_category); // Elimina la imagen
        }
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
        $pdf = PDF::loadview('PDF.listadocategories', compact('categories'));
        return $pdf->stream('listadocategories.pdf');
    }
    
}
