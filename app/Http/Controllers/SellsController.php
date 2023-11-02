<?php

namespace App\Http\Controllers;
use App\Models\Sells;
use App\Models\Products;
use Illuminate\Http\Request;
use PDF;

class SellsController extends Controller
{
    public function index()
    {
        $sells=Sells::all();
        return view('sellsindex', compact('sells'));
    }

    public function create()
    {
        $products =  Products::all(); // Reemplaza 'Category' con el modelo de tus categorías.
        return view('sellscreate', compact('products'));    }

    public function store(Request $request)
    {
        //return $request->all();
        $sell = new Sells();
        $sell->product_id = $request->input('product_id'); // Asigna la categoría
        $sell -> amount = $request -> input('amount');
        $sell -> date = $request -> input('date');
        $sell -> save();
        return redirect()->route('sells.index');
    }
    

public function show(Sells $sell)
{
    return view('sellsshow', compact('sell'));
}
        public function PDF()
        {
            $sells = sells::all();
            $pdf = PDF::loadview('pdf.listadosells', compact('sells'));
            return $pdf->download('listadosells.pdf');
        }
}