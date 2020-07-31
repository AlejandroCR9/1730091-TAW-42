<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Paciente;
use App\Expediente;
class pacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all(); //Trae todos los registro de la bd
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ultimo()
    {
        
        $paciente = Paciente::orderBy('id','desc')->value('id'); //Trae todos los registro de la bd
        return $paciente; //Regresa esos registros
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente(); //Crea un nuevo paciente de la tabla
        $expediente = new Expediente(); //Crea un nuevo paciente de la tabla
        
        /*Recupera los datos del request*/
        $paciente->nombre = $request->nombre;
        $paciente->apellidos = $request->apellidos;
        $paciente->domicilio= $request->domicilio;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->telefono = $request->telefono;
        $paciente->email = $request->email;
        $paciente->save(); ///Guarda los datos

        $expediente->idPaciente=$request->id;
        $expediente->idMedico=$request->idMedico;
        $expediente->sexo=$request->sexo;
        $expediente->save(); //Guarda los datos
       
        return $paciente;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeE(Request $request)
    {
        $expediente = new Expediente(); //Crea un nuevo paciente de la tabla
        
        $expediente->idPaciente=$request->id;
        $expediente->idMedico=$request->idMedico;
        $expediente->sexo=$request->sexo;
        $expediente->save(); //Guarda los datos
        return $expediente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id); //Busca el registro en la bd o falla
        return $paciente;  //Regresa el paciente encontrado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $paciente = Paciente::findOrFail($id); //Busca primero el paciente 
        //Obtiene los datos del request y actualiza los nuevos datos
        $paciente->nombre = $request->nombre;
        $paciente->apellidos = $request->apellidos;
        $paciente->domicilio= $request->domicilio;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->telefono = $request->telefono;
        $paciente->email = $request->email;
        $paciente->save(); //Guarda el cambio

        return $paciente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id); //Busca el paciente a eliminar
        $paciente->delete(); //Borra el paciente encontrado
        return $paciente;
    }
}
