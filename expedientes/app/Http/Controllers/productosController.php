<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all(); //Trae todos los registro de la bd
        return $productos; //Regresa esos registros
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto(); //Crea un nuevo producto de la tabla
        //Recupera los datos del request
        $producto->nombre = $request->nombre; 
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->save(); //Guarda los datos
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id); //Busca el registro en la bd o falla
        return $producto;  //Regresa el producto encontrado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $producto = Producto::findOrFail($id); //Busca primero el producto 
        //Obtiene los datos del request y actualiza los nuevos datos
        $producto->nombre = $request->nombre;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->save(); //Garda el cambio

        return $producto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id); //Busca el producto a eliminar
        $producto->delete(); //Borra el producto encontrado
        return $producto;
    }
}
