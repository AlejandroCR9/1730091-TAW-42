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
                        <div><h4>Esta consultando a {{ paciente.nombre +" "+ paciente.apellidos }}</h4>
                            <div class="page-title-subheading">Esta consultando un paciente, encontrara el expediente completo y si es necesario recetar un medicamento o agregar observaciones extra.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="main-card mb-3 card">
                <form class="needs-validation" @submit.prevent="addConsulta">
                    <div class="card-body">
                        <h5 class="card-title">Consultando</h5>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <input placeholder="and..." v-model="cita.id" type="text" class="form-control" hidden>
                                <label for="validationCustom02">Observaciones:</label>
                                <textarea name="text"  placeholder="Escriba las observaciones" class="form-control" maxlength="200"  style="height: 200px;" v-model="cita.observaciones" required></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="d-block text-center card-footer">
                        <button class="btn-wide btn btn-warning" @click.prevent="recetar(cita.id)">Recetar Medicamento</button>
                        <button class="btn-wide btn btn-success">Terminar</button>
                    </div>
                </form>
                
            </div>
            <div class="main-card mb-3 card">
                <div class="card-header">
                     <h5 class="card-title">Expediente</h5>
                </div>
                <div class="card-body">
                    <div id="accordion" class="accordion-wrapper mb-3">
                        <div class="card">
                            <div id="headingOne" class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                    <h5 class="m-0 p-0">Datos Personales</h5>
                                </button>
                            </div>
                            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                           <label for="validationCustom01"><b>Nombre:</b> </label><i> {{" "+ paciente.nombre+" "+ paciente.apellidos }}</i>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01"><b>Sexo:</b> </label><i>{{" "+paciente.sexo}}</i>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                             <label for="validationCustom01"><b>Fecha de nacimiento:</b> </label><i>{{ " "+paciente.fecha_nacimiento}}</i>
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                             <label for="validationCustom01"><b>Edad:</b> </label><i>{{ " "+getEdad(paciente.fecha_nacimiento)}}</i>
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01"><b>Telefono:</b> </label><i>{{" "+ paciente.telefono}}</i>
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                             <label for="validationCustom01"><b>Médico:</b></label><i>{{" "+paciente.medico+ ' '+ paciente.medico2}}</i>
                                        </div>
                                        <!---->
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
          consulta:{},
          cita:{},
          comentariosexpediente:{}, //carga todos loc comentarios que le han hecho al paciente
          ale:{}, //alergias
          pad:{}, //padecimientos
          band:"a"
        }
    },//Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          //let uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/paciente/expediente/${this.$route.params.id}`;
          let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/expediente/${this.$route.params.id}`;
          
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo paciente
          this.axios.get(uri).then(response => {
             this.paciente = response.data;
             //console.log("HOLA"+this.paciente.fecha_nacimiento);
          });
        
            //Url directa del metodo en laravel que me obtiene valores de la bd
          
          //let uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/paciente/expediente/${this.$route.params.id}`;
          uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/cita/edit/${this.$route.params.idcita}`;
          
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo paciente
          this.axios.get(uri).then(response => {
             this.cita = response.data;
             //console.log("HOLA"+this.paciente.fecha_nacimiento);
          });
          
          //Url directa del metodo en laravel que me obtiene valores de la bd
          uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/alergias/${this.$route.params.id}`;
          //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.ale = response.data;
          });

          //Url directa del metodo en laravel que me obtiene valores de la bd
          uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/padecimientos/${this.$route.params.id}`;
          //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.pad = response.data;
          });

            //SE TRAE LOS COMENTARIOS QUE HA TENIDO EL EXPEDIENTE
            //Url directa del metodo en laravel que me obtiene valores de la bd
            uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/comentarios/${this.$route.params.id}`;
            //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
            this.axios.get(uri).then(response => {
                this.comentariosexpediente = response.data;
            });

          
    }, methods: {
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
        addConsulta(){
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            this.cita.estadoCita=2;
            let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/cita/update/${this.$route.params.idcita}`;
            console.log(this.cita)
            this.axios.post(uri, this.cita).then((response) => {
                if(response.data=="error"){ 
                    alert("La fecha y hora ya estan registradas")
                }else{
                    if(this.band == "a"){
                        console.log("ERRORR"+this.band)
                        this.$swal.fire(
                        '¡Exito!',
                        'Se atendio al paciente',
                        'success'
                        )
                        this.$router.push({name: 'vermiscitas' , params: { mis: 1 }}); //vuelve a renderizar la tabla a la vista de la tabla
                    }
                }
            });
        },
        //Metodo que pregunta si desea ir a recetar al paciente
        recetar(id){
            this.$swal.fire({
                title: '¿Estás seguro?',
                text: "Se marcara como atendida la cita",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Continuar'
            }).then((result) => {
                if (result.value) { //Si se presiona continuar se marca como atendiada la consulta y redireige a la ventana
                    this.band="b"
                    this.addConsulta()
                    this.$router.push({name: 'receta' , params: { idcita: id }});
                }
            })
        }
    }
  }
    

</script>