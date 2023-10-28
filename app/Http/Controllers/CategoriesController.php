<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories=Categories::all();
        return view('categoriesindex', compact('categories'));
    }

    public function create()
    {
        return view('categoriescreate');
    }

    public function store(Request $request)
    {
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
        'category_name' => 'required',
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
    
    
}
