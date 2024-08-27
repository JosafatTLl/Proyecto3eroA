<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\Producto;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class ProductoController extends Controller
{
    //
    // public function __invoke() {
        
    // }

    public function index() {
        $productos = Producto::all();
        return view('producto.productos', ["productos"=> $productos]);
    }
    
    public function crear(){
        return view('producto.creando');
    }

    public function show($id) {

        $producto = Producto::findOrFail($id);
        return view('producto.verProducto',["datos"=> $producto]);
    }

    public function store(Request $request){

        $validatedData= $request->validate([
            'Nombre' => 'required|string|max:255|unique:productos,nombre',
            'stock' => 'required|integer|min:0',
            'PrecioUnitario' => 'required|numeric|min:0',
            'Descripcion' => 'nullable|string|max:1000',
        ]);
    
        Producto::create($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
        
        //return 'se guardo correctamente los productos'. $request;
    }

    public function destroy($id)
    {
        $producto = Producto::findORfail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
    public function update()
    {
        $producto = Producto::findORfail($id);
        $producto->update();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

}
