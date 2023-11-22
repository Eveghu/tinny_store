<?php

namespace App\Http\Controllers;
use App\Models\Types;
use App\Models\Sizes;

use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function index(Request $request)
    {
        $sizes = Sizes::all(); // Reemplaza 'Sizes' con el modelo real de tus tamaños.

            return view('sizesindex', compact('sizes'));
        }
    

        public function create()
        {
            $sizes = new Sizes(); // Crea una nueva instancia del modelo de Producto o consulta un producto existente desde la base de datos.
            $types = Types::all(); // Reemplaza 'Category' con el modelo de tus categorías.
            return view('sizescreate', compact('sizes', 'types'));
        }
        
    
        public function store(Request $request)
        {
     
            $request->validate([
                'size_name' => 'required|string|max:20', // Asegúrate de que size_name está presente
            ]);
            //return $request->all();
            $sizes = new Sizes();
            $sizes->type_id = $request->input('type_id'); // Asigna la categoría
            $sizes -> size_name= $request -> input('size_name');
            $sizes -> save();
            return redirect()->route('sizes.index');
        }
    
    
        public function show(Sizes $size)
    {
        return view('sizesshow', compact('sizes'));
    }
    
    public function edit($id)
    {
        $types = Types::all(); // Cambié $type a $types
        $sizes = Sizes::find($id);
        return view('editsize', compact('sizes', 'types')); // Cambié $type a $types
    }
    
    
    public function update(Request $request, $id)
    {
  
    
        $sizes= Sizes::find($id);
    
        if (!$sizes) {
            return redirect()->route('sizes.index')->with('error', 'Size not found');
        }
    
        $sizes -> size_name = $request -> input('size_name');
    
        $sizes -> save();
    
        return redirect()->route('sizes.index')->with('success', 'Size updated successfully');
    }
    
    
        // ...
    
    
        public function destroy($id)
        {
            $sizes = Sizes::find($id);
        
            if (!$sizes) {
                return redirect('/sizes')->with('error', 'Las tallas no existe o ya ha sido eliminado');
            }
        
            $sizes->delete();
        
            return redirect('/sizes')->with('success', 'Tallas eliminadas exitosamente');
        }
        
            
        
    
    
}
