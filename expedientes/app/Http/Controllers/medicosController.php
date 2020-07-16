<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class medicosController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $medicos = User::where("tipo","=","2")->get(); //Trae todos los registro de la bd
        return $medicos; //Regresa esos registros
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {   
        $user= new User(); //Crea un nuevo medicamento de la tabla
        //Recupera los datos del request
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        $user->domicilio = $request->domicilio;
        $user->tipo = 2;
        $user->telefono = $request->telefono;
        $user->user = $request->user;
        $user->email=  $request->email;
        $user->password = Hash::make($request->password);
        $user->save(); //Guarda los datos
        return $user;
          
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $medicos =  User::where("tipo","=","3")->get(); //Trae todos los registro de la bd
        return $medicos; //Regresa esos registros
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create2(Request $request)
    {   
        $user= new User(); //Crea un nuevo medicamento de la tabla
        //Recupera los datos del request
        /*$user->name = $data['name'];
        $user->apellidos = $data['apellidos'];
        $user->cedula = $data['cedula'];
        $user->domicilio = $data['domicilio'];
        $user->tipo = 3;
        $user->telefono = $data['telefono'];
        $user->user = $data['user'];
        $user->email=  $data['email'];
        $user->password = Hash::make($data['password']);*/
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        $user->domicilio = $request->domicilio;
        $user->tipo = 3;
        $user->telefono = $request->telefono;
        $user->user = $request->user;
        $user->email=  $request->email;
        $user->password = Hash::make($request->password);
        $user->save(); //Guarda los datos
        return $user;
          
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = User::find($id); //Busca el paciente a eliminar
        $medico->delete(); //Borra el paciente encontrado
        return $medico;
    }

}
