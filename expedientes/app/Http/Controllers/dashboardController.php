<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Paciente;
use App\User;
use App\Cita;

class dashboardController extends Controller
{
    //=========================ADMINISTRADOR
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantPacientes(){
        //Recuento total de pacientes
        $pacientes = Paciente::all()->count(); //Trae todos los registro de la bd
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantMedicos(){
        //Receunto toral de los medicos
        $pacientes = User::where("tipo","=","2")->count(); //Trae todos los registro de la bd
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantSecretarias(){
        //Recuento total de secretarias
        $pacientes = User::where("tipo","=","3")->count(); //Trae todos los registro de la bd
        return $pacientes; //Regresa esos registros
    }

    //==========================MEDICO
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantmispacientes($id){
        //Recuento de los pacientes que estan asignados a cierto doctor
        $pacientes=Paciente::join('expedientes', 'pacientes.id', '=', 'expedientes.idPaciente')->join('users', 'users.id', '=', 'expedientes.idMedico')->where("expedientes.idMedico","=",$id)->count();
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantmiscitas($id){
        //se trae el recuento de citas sin atender
        $citas=Cita::join('expedientes', 'citas.idExpediente', '=', 'expedientes.id')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->where("estadoCita",1)->where("expedientes.idMedico","=",$id)->count();
        return $citas; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantmiscitastotales($id){
        //Se trae el recuento de los las citas que ha tenido en su totalida
        $citas=Cita::join('expedientes', 'citas.idExpediente', '=', 'expedientes.id')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->where("expedientes.idMedico","=",$id)->count();
        return $citas; //Regresa esos registros
    }
}
