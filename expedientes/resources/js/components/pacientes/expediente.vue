<template>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div><h4>Expediente de {{ paciente.nombre +" "+ paciente.apellidos }}</h4>
                            <!--<div class="page-title-subheading">Listado de pacientes registrados en el sistema.
                            </div>-->
                        </div>
                    </div> 
                    <div class="page-title-actions" v-if="this.$cookies.get('id') == this.paciente.idmedi">
                        <button type="button" class="btn-shadow mr-3 btn btn-dark" @click.prevent="compartir()">
                            <i class="pe-7s-share"></i>
                         </button>
                    </div>   
                </div>
            </div>
            <div class="main-card mb-3 card"  v-if="this.$cookies.get('id') != this.paciente.idmedi && this.$cookies.get('tipo')!=1">
                <form class="needs-validation" @submit.prevent="addCom">
                    <div class="card-body">
                        <h5 class="card-title">Dejar comentario</h5>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02">Comentario:</label>
                                <textarea name="text"  placeholder="Escriba las observaciones" class="form-control" maxlength="200"  style="height: 200px;" v-model="coment.com" required></textarea>
                                <div class="valid-feedback">
                                   
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="d-block text-center card-footer">
                        <button class="btn-wide btn btn-success">Terminar</button>
                    </div>
                </form>
                
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div id="accordion" class="accordion-wrapper mb-3">    
                        <div class="card">
                            <div id="headingOne" class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                    <h3 class="m-0 p-0">Datos Personales</h3>
                                </button>
                            </div>
                            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                           <h6> <label for="validationCustom01"><b>Nombre:</b> </label><i> {{" "+ paciente.nombre+" "+ paciente.apellidos }}</i></h6>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h6><label for="validationCustom01"><b>Sexo:</b> </label><i>{{" "+paciente.sexo}}</i></h6>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                             <h6><label for="validationCustom01"><b>Fecha de nacimiento:</b> </label><i>{{ " "+paciente.fecha_nacimiento}}</i></h6>
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                             <h6><label for="validationCustom01"><b>Edad:</b> </label><i>{{ " "+getEdad(paciente.fecha_nacimiento)}}</i></h6>
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <h6><label for="validationCustom01"><b>Telefono:</b> </label><i>{{" "+ paciente.telefono}}</i></h6>
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                             <h6><label for="validationCustom01"><b>Médico:</b></label><i>{{" "+paciente.medico+ ' '+ paciente.medico2}}</i></h6>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingTwo" class="b-radius-0 card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block"><h3 class="m-0 p-0">Alergias y Padecimientos</h3></button>
                            </div>
                            <div data-parent="#accordion" id="collapseOne2" class="collapse">
                                <div class="card-header" v-if="this.$cookies.get('id') ==this.paciente.idmedi">
                                   <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-primary"  @click.prevent="hola()">Agregar Alergia</button>
                                        </div>

                                        <div class="input-group-append">
                                            <button class="btn btn-primary" @click.prevent="hola()">Agregar Padecimiento</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <h5><b> <label for="validationCustom01">Alergias</label></b></h5>
                                    <div class="form-row" v-for="(a) in ale" :key="a.id">
                                        
                                        <div >
                                            <div class="col-md-12 mb-3">
                                            <h6> <label for="validationCustom01">Nombre: </label><i> {{ a.alergian }}</i></h6>

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <h6><label for="validationCustom01">Descripción: </label><i>{{ a.alergiades }}</i></h6>
                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5><b> <label for="validationCustom01">Padecimientos</label></b></h5>
                                    <div class="form-row" v-for="(p) in pad" :key="p.id">
                                        
                                        <div >
                                            <div class="col-md-12 mb-3">
                                            <h6> <label for="validationCustom01">Nombre: </label><i> {{ p.padn }}</i></h6>

                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <h6><label for="validationCustom01">Descripción: </label><i>{{ p.paddes }}</i></h6>
                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingThree" class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h3 class="m-0 p-0">Historial Clinico</h3></button>
                            </div>
                            <div data-parent="#accordion" id="collapseOne3" class="collapse">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fecha Asignada</th>
                                                <th>Observaciones</th>
                                                <!--<th>Medicamentos</th>-->
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(h) in historialcitas" :key="h.id">
                                                    <!--Se recuperan los  comentarios de este expediene-->
                                                    <td v-text="h.id"></td>
                                                    <td v-text="h.fecha"></td>
                                                    <td v-text="h.observaciones"></td>
                                                    <!--<td v-text="h.fecha"></td>-->
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingFour" class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseFour" class="text-left m-0 p-0 btn btn-link btn-block"><h3 class="m-0 p-0">Comentarios</h3></button>
                            </div>
                            <div data-parent="#accordion" id="collapseOne4" class="collapse">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="mb-0 table">
                                            <thead>
                                            <tr>
                                                <th>Nombre Médico</th>
                                                <th>Comentario</th>
                                                <th>Comentario hecho el</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(c) in comentariosexpediente" :key="c.id">
                                                    <!--Se recuperan los  comentarios de este expediene-->
                                                    <td v-text="c.nombre + ' '+ c.apellidos"></td>
                                                    <td v-text="c.comentario"></td>
                                                    <td v-text="c.fecha"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    
    export default {
        
        data(){
            return {
                //NUestro array donde se almacena los datos
                paciente:{},
                ale:{}, //alergias
                pad:{}, //padecimientos
                medicos:{},//medicos
                coment:{},//Comentario en caso de ser otro medico
                comentariosexpediente:{}, //carga todos loc comentarios que le han hecho al paciente
                historialcitas:{}//todas las citas qu ele han atendido
            }
        },//Se ejecuta una cuando se crea el componente
        created() {
            //SE TRAE LA INFORMACIÓN PRINCIPAL DEL PACIENTE
            
            //let uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/paciente/expediente/${this.$route.params.id}`;
            let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/expediente/${this.$route.params.id}`;
            
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo paciente
            this.axios.get(uri).then(response => {
                this.paciente = response.data;
                //console.log("HOLA"+this.paciente.idmedi);
            });

            //SE TRAE LAS ALERGIAS DEL PACIENTE
            //Url directa del metodo en laravel que me obtiene valores de la bd
            uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/alergias/${this.$route.params.id}`;
            //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
            this.axios.get(uri).then(response => {
                this.ale = response.data;
            });
                //SE TRAE LOS PADECIMIENTOS QUE TIENE LE PACIENTE
            //Url directa del metodo en laravel que me obtiene valores de la bd
            uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/padecimientos/${this.$route.params.id}`;
            //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
            this.axios.get(uri).then(response => {
                this.pad = response.data;
            });

                //SE TRAE LOS COMENTARIOS QUE HA TENIDO EL EXPEDIENTE
            //Url directa del metodo en laravel que me obtiene valores de la bd
            uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/comentarios/${this.paciente.idExpediente}`;
            //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
            this.axios.get(uri).then(response => {
                this.comentariosexpediente = response.data;
            });

            //SE TRAE LAS CITAS QUE HA TENIDO EL EXPEDIENTE
            //Url directa del metodo en laravel que me obtiene valores de la bd
            uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/historialcitas/${this.paciente.idExpediente}`;
            //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
            this.axios.get(uri).then(response => {
                this.historialcitas = response.data;
            });

            //Url directa del metodo en laravel que me obtiene valores de la bd
            uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medico`;
            //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
            this.axios.get(uri).then(response => {
                this.medicos = response.data;
            });

          
        }, 
        methods: {
            getEdad(dateString) {
                let hoy = new Date() //Se obtiene la fecha de hoy
                let fechaNacimiento = new Date(dateString) //El Strign con la fecha de nacimiento se pasa a tipo date
                let edad = hoy.getFullYear() - fechaNacimiento.getFullYear() //Se saca la diferencia de años
                let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth() //Se saca la diferencia de meses
                //Se comprieba si ya si ya se paso su mes y dia.
                if (diferenciaMeses < 0 || (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())){
                    edad-- //Si aun no ha pasado se reste un año
                }
                return edad //Se regresa la fecha
            },
            validar(){
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            },
            async compartir(){
                //console.log(this.medicos)
                var options = {};
                var result;
                //"Convierte en un array valido para sweet alert
                $.map(this.medicos,
                    function(o) {
                        options[o.id] = o.name +" "+o.apellidos;
                    });
                //console.log(options)
                var a  = await this.$swal.fire({
                    title: 'Compartir con...',
                    input: 'select',
                    inputOptions: options,
                    inputPlaceholder: 'Selecciona un medico',
                    showCancelButton: true,
                    inputValidator: (value) => {
                        return new Promise((resolve) => {
                            if (value != '') { //Valida que seleccione un elemento para continuar
                                resolve()
                            } else {
                                resolve('Selecciona un elemento porfavor')
                            }
                        })
                    }
                }).then(function (inputValue){
                    return inputValue.value
                });
                //Validacion del dr seleccionado por el usuario
                if(a!=this.$cookies.get("id")){
                    this.guardarCompartido(a) //En caso de ser diferente a si mismo se llama el metodo
                    //console.log(a);
                }else{
                    this.aviso()
                }
                //console.log("Seleccionaste id: "+a);
            },
            //Metodo para que registra el expediente que se va a compartir
            guardarCompartido(m){
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/compartir';
                    this.axios.post(uri, { "idExpediente": this.paciente.idExpediente, "idMedico": m }).then((response) => {
                        if(response.data=="error"){
                            this.$swal.fire({ //En caso de que el expediente ya este compartido con esa persona
                                title: 'Error',
                                text: "Ya esta compartido con ese dr.",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                
                            })
                        }else{
                            //MEnsaje de exito en caso de que se comparta el expediente de manera correcta
                            this.$swal.fire({
                                title: 'Exito',
                                text: "Se compartio con exito",
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                
                            })
                        }
                    });
            },
            hola(){ //Mensaje de funcion no disponible de sweetalert
                this.$swal.fire({
                    title: 'No disponible',
                    text: "Aun no",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    
                })
            },
            aviso(){ //Aviso de no disponible el compartir en caso de que se seleccione a uno mismo
                this.$swal.fire({
                    title: 'No disponible',
                    text: "Te seleccionaste a ti mismo",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    
                })
            },
            //Metodo que añade un comentario al expediente que se esta visualozando
            addCom(){
    
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/guardarcomentario';
                this.axios.post(uri, { "idExpediente": this.paciente.idExpediente, "idMedico": this.$cookies.get('id'), 
                "comentario": this.coment.com }).then((response) => {
                    //Muestra el mensaje de exito en el servidor
                    this.$swal.fire(
                    '¡Exito!',
                    'Se registro el comentario',
                    'success'
                    )
                    this.$router.push({name: 'mecompartieron'}); //Redireccion
                });
            }
        }
    }
    

</script>