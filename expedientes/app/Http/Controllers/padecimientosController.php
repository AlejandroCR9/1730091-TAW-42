<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Padecimiento;
class padecimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $padecimientos = Padecimiento::all(); //Trae todos los registro de la bd
        return $padecimientos; //Regresa esos registros
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $padecimiento = new Padecimiento(); //Crea un nuevo padecimiento de la tabla
        //Recupera los datos del request
        $padecimiento->nombre = $request->nombre; 
        $padecimiento->descripcion = $request->descripcion;
        $padecimiento->save(); //Guarda los datos
        return $padecimiento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $padecimiento = Padecimiento::findOrFail($id); //Busca el registro en la bd o falla
        return $padecimiento;  //Regresa el padecimiento encontrado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $padecimiento = Padecimiento::findOrFail($id); //Busca primero el padecimiento 
        //Obtiene los datos del request y actualiza los nuevos datos
        $padecimiento->nombre = $request->nombre;
        $padecimiento->descripcion = $request->descripcion;
        $padecimiento->save(); //Garda el cambio

        return $padecimiento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $padecimiento = Padecimiento::find($id); //Busca el padecimiento a eliminar
        $padecimiento->delete(); //Borra el padecimiento encontrado
        return $padecimiento;
    }
}
