<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alergia;
class alergiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alergias = Alergia::all(); //Trae todos los registro de la bd
        return $alergias; //Regresa esos registros
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alergia = new Alergia(); //Crea un nuevo alergia de la tabla
        //Recupera los datos del request
        $alergia->nombre = $request->nombre; 
        $alergia->descripcion = $request->descripcion;
        $alergia->save(); //Guarda los datos
        return $alergia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alergia = Alergia::findOrFail($id); //Busca el registro en la bd o falla
        return $alergia;  //Regresa el alergia encontrado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $alergia = Alergia::findOrFail($id); //Busca primero el alergia 
        //Obtiene los datos del request y actualiza los nuevos datos
        $alergia->nombre = $request->nombre;
        $alergia->descripcion = $request->descripcion;
        $alergia->save(); //Garda el cambio

        return $alergia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alergia = Alergia::find($id); //Busca el alergia a eliminar
        $alergia->delete(); //Borra el alergia encontrado
        return $alergia;
    }
}
