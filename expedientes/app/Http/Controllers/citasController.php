<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cita;
use App\Expediente;
use App\CitasMedicamento;
class citasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::join('expedientes', 'expedientes.id', '=', 'citas.idExpediente')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->select('citas.id','citas.estadoCita AS estado','citas.observaciones','citas.fechaAsignada AS fecha', 'pacientes.nombre','pacientes.apellidos','pacientes.telefono','pacientes.id As idPaciente')->orderBy('estadoCita','ASC')->orderBy('fechaAsignada','ASC')->get(); //Trae la informacion de la cita
        return $citas; //Regresa esos registros
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function miscitas($id){
        $citas=Cita::join('expedientes', 'citas.idExpediente', '=', 'expedientes.id')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->select('citas.id','citas.estadoCita AS estado','citas.observaciones','citas.fechaAsignada AS fecha', 'pacientes.nombre','pacientes.apellidos','pacientes.telefono','pacientes.id As idPaciente')->where("expedientes.idMedico",$id)->where("estadoCita",1)->orderBy('fechaAsignada','ASC')->get(); //Trae las citas especificas de cierto doctor y que estas no hayan sido atendidads

        return $citas; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function miscitas2($id){
        $citas=Cita::join('expedientes', 'citas.idExpediente', '=', 'expedientes.id')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->select('citas.id','citas.estadoCita AS estado','citas.observaciones','citas.fechaAsignada AS fecha', 'pacientes.nombre','pacientes.apellidos','pacientes.telefono','pacientes.id As idPaciente')->where("expedientes.idMedico",$id)->where("estadoCita",2)->orderBy('fechaAsignada','ASC')->get(); //Trae las citas del doctor espesifico y que estas hayan sido atendidas

        return $citas; //Regresa esos registros
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
        if(Cita::where('fechaAsignada', $request->fechaAsignada)->value('fechaAsignada')){ //En caso de que ya se haya tomado la fecha y la hora 
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
        //Se verifica que no se empalemn las fechas de las citas
        if(Cita::where('fechaAsignada', $request->fechaAsignada)->value('fechaAsignada') && $request->estadoCita==1){
            return "error";
         } else {
            if($request->estadoCita==1) //Si la cita no esta atendiad se busca el id del expediente
                $expediente=Expediente::where('idPaciente',$request->idPaciente)->value('id');
            else{ //Se asigna el id del expediete 
                $expediente=$request->idExpediente;
                $cita->estadoCita=$request->estadoCita;
            }
                
             $cita->idExpediente = $expediente;
             $cita->observaciones = $request->observaciones; 
             $cita->fechaAsignada = $request->fechaAsignada;
             $cita->save(); //Guarda los datos
 
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

    //======================================RECTTAS
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recetasCitas($id){
        //Se traelos medicamentos de una cita en especifico
        $citas=Cita::join('citamedicamentos', 'citamedicamentos.idCita', '=', 'citas.id')->join('medicamentos', 'citamedicamentos.idMedicamento', '=', 'medicamentos.id')->select('medicamentos.nombre AS nombremedicamento','medicamentos.percio','citamedicamentos.dosis','citamedicamentos.id','citamedicamentos.frecuencia',	'citamedicamentos.viaAdministracion','citamedicamentos.duracion')->where("citamedicamentos.idCita",$id)->get(); 

        return $citas; //Regresa esos registros
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarReceta(Request $request)
    {   
        $cita = new CitasMedicamento(); //Crea un nuevo cita de la tabla
        $cita->idMedicamento = $request->idMedicamento;
        $cita->idCita = $request->idCita; 
        $cita->dosis = $request->dosis;
        $cita->frecuencia = $request->frecuencia;
        $cita->viaAdministracion = $request->viaAdministracion;
        $cita->duracion = $request->duracion;
        $cita->save(); //Guarda los datos

        return $cita;
       
    }

}
