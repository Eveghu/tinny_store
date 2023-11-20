<?php

namespace App\Http\Controllers;
use App\Models\Types;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function index(Request $request)
    {

            return view('sizesindex', compact('sizes'));
        }
    

        public function create()
        {
            $size = new Sizes(); // Crea una nueva instancia del modelo de Producto o consulta un producto existente desde la base de datos.
            $types = Types::all(); // Reemplaza 'Category' con el modelo de tus categorías.
            return view('sizescreate', compact('sizes', 'types'));
        }
        
    
        public function store(Request $request)
        {
            $request->validate([
                'size_name' => 'required|string|max:20',

            ]);
            
            //return $request->all();
            $size = new Sizes();
            $size->type_id = $request->input('type_id'); // Asigna la categoría
            $size->name_size = implode(',', $request->input('name_size'));
            $size -> save();
            return redirect()->route('sizes.index');
        }
    
    
        public function show(Sizes $size)
    {
        return view('sizesshow', compact('sizes'));
    }
    
    public function edit($id)
    {
        $types = Types::all(); // Cambié $type a $types
        $size = Sizes::find($id);
        return view('editsize', compact('sizes', 'types')); // Cambié $type a $types
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'size_name' => 'required|string|max:30',
        ]);
        
    
        $size= Sizes::find($id);
    
        if (!$size) {
            return redirect()->route('sizes.index')->with('error', 'Size not found');
        }
    
        $size->size_name = implode(',', $request->input('size_name')); // Almacena tallas como una cadena
    
        $size -> save();
    
        return redirect()->route('sizes.index')->with('success', 'Size updated successfully');
    }
    
    
        // ...
    
    
        public function destroy($id)
        {
            $size = Sizes::find($id);
        
            if (!$size) {
                return redirect('/sizes')->with('error', 'Las tallas no existe o ya ha sido eliminado');
            }
        
            $product->delete();
        
            return redirect('/sizes')->with('success', 'Tallas eliminadas exitosamente');
        }
        
            
        
    
    
}
