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
        $pacientes = Paciente::all()->count(); //Trae todos los registro de la bd
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantMedicos(){
        $pacientes = User::where("tipo","=","2")->count(); //Trae todos los registro de la bd
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantSecretarias(){
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
        $pacientes=Paciente::join('expedientes', 'pacientes.id', '=', 'expedientes.idPaciente')->join('users', 'users.id', '=', 'expedientes.idMedico')->where("expedientes.idMedico","=",$id)->count();
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantmiscitas($id){
        $citas=Cita::join('expedientes', 'citas.idExpediente', '=', 'expedientes.id')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->where("estadoCita",1)->where("expedientes.idMedico","=",$id)->count();

        return $citas; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cantmiscitastotales($id){
        $citas=Cita::join('expedientes', 'citas.idExpediente', '=', 'expedientes.id')->join('pacientes', 'pacientes.id', '=', 'expedientes.idPaciente')->where("expedientes.idMedico","=",$id)->count();

        return $citas; //Regresa esos registros
    }
}
