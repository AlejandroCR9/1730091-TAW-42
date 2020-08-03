<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cita;
use App\Expediente;
class citasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::join('expedientes', 'expedientes.id', '=', 'citas.idExpediente')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->select('citas.id','citas.observaciones','citas.fechaAsignada AS fecha', 'pacientes.nombre','pacientes.apellidos','pacientes.telefono','pacientes.id As idPaciente')->get(); //Trae todos los registro de la bd
        
        return $citas; //Regresa esos registros
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function miscitas($id){
        $pacientes=Cita::join('expedientes', 'citas.idExpediente', '=', 'expedientes.id')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->select('citas.id','citas.observaciones','citas.fechaAsignada AS fecha', 'pacientes.nombre','pacientes.apellidos','pacientes.telefono','pacientes.id As idPaciente')->where("expedientes.idMedico","=",$id)->get();
        return $pacientes; //Regresa esos registros
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cita = new Cita(); //Crea un nuevo cita de la tabla
        //Recupera los datos del request
        if(Cita::where('fechaAsignada', $request->fechaAsignada)->value('fechaAsignada')){
           return "error";
        } else {
            $expediente=Expediente::where('idPaciente',$request->idPaciente)->value('id');
            $cita->idExpediente = $expediente;
            $cita->observaciones = $request->observaciones; 
            $cita->fechaAsignada = $request->fechaAsignada;
            $cita->save(); //Guarda los datos

            return $cita;
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::findOrFail($id); //Busca el registro en la bd o falla
        $cita->fechaAsignada=substr($cita->fechaAsignada,0,10)."T".substr($cita->fechaAsignada,11,5);
        return $cita;  //Regresa el padecimiento encontrado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $cita = Cita::findOrFail($id); //Busca primero el cita
        //Obtiene los datos del request y actualiza los nuevos datos
        if(Cita::where('fechaAsignada', $request->fechaAsignada)->value('fechaAsignada')){
            return "error";
         } else {
             $expediente=Expediente::where('idPaciente',$request->idPaciente)->value('id');
             $cita->idExpediente = $expediente;
             $cita->observaciones = $request->observaciones; 
             $cita->fechaAsignada = $request->fechaAsignada;
             //$cita->save(); //Guarda los datos
 
             return $cita;
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id); //Busca el padecimiento a eliminar
        $cita->delete(); //Borra el padecimiento encontrado
        return $cita;
    }
}
