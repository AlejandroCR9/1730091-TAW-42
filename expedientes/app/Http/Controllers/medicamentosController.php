<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicamento;
class medicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = Medicamento::all(); //Trae todos los registro de la bd
        return $medicamentos; //Regresa esos registros
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicamento = new Medicamento(); //Crea un nuevo medicamento de la tabla
        //Recupera los datos del request
        $medicamento->nombre = $request->nombre;
        $medicamento->presentacion = $request->presentacion;
        $medicamento->descripcion= $request->descripcion;
        $medicamento->precio = $request->precio;
        $medicamento->save(); //Guarda los datos
        return $medicamento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id); //Busca el registro en la bd o falla
        return $medicamento;  //Regresa el medicamento encontrado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $medicamento = Medicamento::findOrFail($id); //Busca primero el medicamento 
        //Obtiene los datos del request y actualiza los nuevos datos
        $medicamento->nombre = $request->nombre;
        $medicamento->presentacion = $request->presentacion;
        $medicamento->descripcion= $request->descripcion;
        $medicamento->precio = $request->precio;
        $medicamento->save(); //Guarda el cambio

        return $medicamento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicamento = Medicamento::find($id); //Busca el medicamento a eliminar
        $medicamento->delete(); //Borra el medicamento encontrado
        return $medicamento;
    }
}
