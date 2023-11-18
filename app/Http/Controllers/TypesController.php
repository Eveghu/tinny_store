<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index(Request $request)
    {
        $type = Types::all(); // Obtener todos los registros de la tabla 'types'
            return view('typesindex', compact('type'));
        
    }
    public function create()
    {
        return view('typescreate');
    }

    public function store(Request $request)
{
    $request->validate([
        'type_name' => 'required|string|max:20',
    ]);

    $type = new Types();
    $type->type_name = $request->input('type_name');
    $type->save();

    return redirect()->route('types.index');
}

    
    // Aquí continúa tu lógica para guardar el registro en la base de datos


        //return $request->all();



public function edit($id)
{
    $type = Types::find($id);
    return view('edittype', compact('type'));
}



public function update(Request $request, $id)
{
    $request->validate([
        'type_name' => 'required|string|max:20',
    ]);

    $type = Types::find($id);

    if (!$type) {
        return redirect()->route('types.index')->with('error', 'Type not found');
    }

    $type->type_name = $request->input('type_name');
    $type->save();

    return redirect()->route('types.index')->with('success', 'Type updated successfully');
}




   public function destroy($id)
{
    $type = Types::find($id);

    if (!$type) {
        return redirect('/types')->with('error', 'El tipo de talla no existe o ya ha sido eliminado');
    }

    $type->delete();

    return redirect('/types')->with('success', 'Tipo de talla eliminado exitosamente');
}

    

}
