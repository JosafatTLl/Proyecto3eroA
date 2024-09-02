<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index() {
        $ventas = Venta::all();
        return view('venta.ventas', ["ventas"=> $ventas]);
        
        //return view('venta.ventas');
    }
    public function crear(){
        $productos = Producto::all(); 
        return view('venta.creando', compact('productos'));
    }

    public function show($id) {

        $ventas = Venta::findOrFail($id); // Devuelve una sola instancia de Venta
        return view('venta.verVenta', ["datos"=> $ventas]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ProductoID' => 'required|integer|exists:productos,ProductoID',
            'NombreCliente' => 'required|string|max:255',
            'Cantidad' => 'required|integer|min:1',
            'PrecioTotal' => 'required|numeric|min:0',
        ]);
    
        $producto = Producto::find($validatedData['ProductoID']);
        
        if (!$producto || $producto->stock < $validatedData['Cantidad']) {
            return redirect()->back()->withErrors(['Cantidad' => 'No hay suficiente stock disponible.'])->withInput();
        }
    
        // Crear una nueva venta
        Venta::create([
            'ProductoID' => $validatedData['ProductoID'],
            'NombreCliente' => $validatedData['NombreCliente'],
            'Cantidad' => $validatedData['Cantidad'],
            'PrecioTotal' => $validatedData['PrecioTotal'],
        ]);
    
        // Actualizar el stock del producto
        $producto->stock -= $validatedData['Cantidad'];
        $producto->save();
    
        return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente.');
    }
    


    public function destroy($id){
        $ventas = Venta::findORfail($id);
        $ventas->delete();
        return redirect()->route('ventas.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function update(Request $request, $id){
        // Validation and update logic
        $ventas = Venta::findORfail($id);
        $ventas->update($request->all());
    
        return redirect()->route('ventas.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function getStock($id)
{
    $producto = Producto::find($id);
    if ($producto) {
        return response()->json(['stock' => $producto->stock]);
    }
    return response()->json(['stock' => 0]);
}

}
