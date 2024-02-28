<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::orderBy('id','desc')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        $ruta = null;
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('public');
        }

        Producto::create([
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'cantidad' => $request->input('cantidad'),
            'imagen' => basename($ruta)
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto registrado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, string $id)
    {
        $ruta = null;
        if ($request->hasFile('imagen')) {
            $item = Producto::find($id);
            Storage::delete('public/'.$item->imagen);
            $ruta = $request->file('imagen')->store('public');
        }

        $producto = Producto::find($id);
        $producto->nombre =  $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->cantidad = $request->input('cantidad');
        $producto->imagen = basename($ruta);
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Producto::find($id);
        Storage::delete('public/'.$item->imagen);
        Producto::destroy($id);
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
