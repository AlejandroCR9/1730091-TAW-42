<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Paciente;
use App\Expediente;
use App\ExpedienteCompartido;
use App\ExpedienteComentario;

class pacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pacientes = Paciente::all(); //Trae todos los registro de la bd
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mispacientes($id){
        $pacientes=Paciente::join('expedientes', 'pacientes.id', '=', 'expedientes.idPaciente')->join('users', 'users.id', '=', 'expedientes.idMedico')->select('pacientes.nombre','pacientes.apellidos', 'pacientes.fecha_nacimiento','pacientes.telefono','pacientes.domicilio','pacientes.id','pacientes.email')->where("expedientes.idMedico","=",$id)->get();
        return $pacientes; //Regresa esos registros
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ultimo() { 
        $paciente = DB::select(DB::raw("SELECT AUTO_INCREMENT AS id FROM information_schema.tables WHERE TABLE_SCHEMA='expedientes' AND TABLE_NAME='pacientes'")); //Trae el ultimo id de los registro de la bd
        return $paciente; //Regresa esos registros
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
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
    public function storeE(Request $request){
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
    public function edit($id){
        $paciente = Paciente::findOrFail($id); //Busca el registro en la bd o falla
        return $paciente;  //Regresa el paciente encontrado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request){
        
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
    public function destroy($id){
        $paciente = Paciente::find($id); //Busca el paciente a eliminar
        $expe= Expediente::where('idPaciente',$id);
        $expe->delete();
        $paciente->delete(); //Borra el paciente encontrado
        return $paciente;
    }

    //======================EXPEDEINTE=========================
    /**
     * Show the info from the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verExpediente($id){
        //Se trae la info del paciente y la de su expediente
        $paciente = Paciente::join('expedientes', 'pacientes.id', '=', 'expedientes.idPaciente')->join('users', 'users.id', '=', 'expedientes.idMedico')->select('pacientes.nombre','pacientes.apellidos', 'pacientes.fecha_nacimiento','pacientes.telefono','expedientes.sexo','users.name AS medico','users.apellidos AS medico2','expedientes.idMedico AS idmedi','expedientes.id AS idExpediente')->where("expedientes.idPaciente","=",$id)->get();
        json_encode($paciente);
        return $paciente[0];//se hace esto debido aque la consulta devuelve un array 
    }

    /**
     * Show the info from the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verAlergias($id){
        $paciente = Paciente::join('expedientes', 'pacientes.id', '=', 'expedientes.idPaciente')->join('expedientealergias', 'expedientealergias.idExpediente', '=', 'expedientes.id')->join('alergias', 'alergias.id', '=', 'expedientealergias.idAlergia')->select('alergias.nombre AS alergian','alergias.descripcion AS alergiades','alergias.id')->where("expedientes.idPaciente","=",$id)->get();
        return $paciente;  //Regresa las alergias enocntradas
    }

    /**
     * Show the info from the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verPadecimientos($id){
        $paciente = Paciente::join('expedientes', 'pacientes.id', '=', 'expedientes.idPaciente')->join('expedientepadecimientos', 'expedientepadecimientos.idExpediente', '=', 'expedientes.id')->join('padecimientos', 'padecimientos.id', '=', 'expedientepadecimientos.idPadecimiento')->select('padecimientos.nombre AS padn','padecimientos.descripcion AS paddes','padecimientos.id')->where("expedientes.idPaciente","=",$id)->get();
        return $paciente;  //Regresa padeicmientos
    }

    /**
     * Show the info from the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verComentarios($id){
        $paciente = ExpedienteComentario::join('expedientes', 'expedientes.id', '=', 'expedientecomentarios.idExpediente')->join('users', 'users.id', '=', 'expedientecomentarios.idMedico')->select('expedientecomentarios.comentario', 'expedientecomentarios.created_at AS fecha','users.name AS nombre','users.apellidos AS apellidos','expedientecomentarios.id')->where("expedientes.id","=",$id)->orderBy('expedientecomentarios.created_At','ASC')->get();
        return $paciente;  //Regresa padeicmientos
    }

    /**
     * Show the info from the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verHistorialCitas($id){
        $paciente = Expediente::join('citas', 'citas.idExpediente', '=', 'expedientes.id')->select('citas.fechaAsignada AS fecha','citas.observaciones AS observaciones','citas.id')->where("expedientes.id","=",$id)->where('estadoCita',2)->orderBy('citas.fechaAsignada','ASC')->get();
        return $paciente;  //Regresa padeicmientos
    }


    //====================COMPARTIDOS
    /**
     * Store a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardarCompartido(Request $request){
        $comp= new ExpedienteCompartido();
        if(ExpedienteCompartido::where('idMedico',$request->idMedico)->where('idExpediente',$request->idExpediente)->first()){
            return 'error';
        }else{
            $comp->idExpediente=$request->idExpediente;
            $comp->idMedico=$request->idMedico;
            $comp->save();
            return $comp;
        }
        
    } 

    /**
     * Store a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardarcomentario(Request $request){
        $comp= new ExpedienteComentario();
        $elim=ExpedienteCompartido::where('idMedico',$request->idMedico)->where('idExpediente',$request->idExpediente)->first();
        $comp->idExpediente=$request->idExpediente;
        $comp->idMedico=$request->idMedico;
        $comp->comentario=$request->comentario;
        $comp->save();
        $elim->delete();
        return $comp;
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function miscompartidos($id){
        $pacientes=ExpedienteCompartido::join('expedientes', 'expedientescompartidos.idExpediente', '=', 'expedientes.id')->join('users', 'users.id', '=', 'expedientescompartidos.idMedico')->select('expedientescompartidos.id','users.name AS nombremedico','users.apellidos AS apellidosmedico','expedientescompartidos.idExpediente AS expediente')->where("expedientes.idMedico","=",$id)->get();
        return $pacientes; //Regresa esos registros
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarCompartido($id){
        $com = ExpedienteCompartido::find($id); //Busca el paciente a eliminar
        $com->delete(); //Borra el paciente encontrado
        return $com;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mecompartieron($id){
        $pacientes=ExpedienteCompartido::join('expedientes', 'expedientescompartidos.idExpediente', '=', 'expedientes.id')->join('users', 'users.id', '=', 'expedientes.idMedico')->select('expedientescompartidos.id','expedientescompartidos.idExpediente AS expediente','users.name AS nombremedico','users.apellidos AS apellidosmedico')->where("expedientescompartidos.idMedico","=",$id)->get();
        return $pacientes; //Regresa esos registros
    }
}
