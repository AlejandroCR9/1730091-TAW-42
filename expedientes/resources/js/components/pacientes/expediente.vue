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
                        <div>Expediente de {{ paciente.nombre }}
                            <!--<div class="page-title-subheading">Listado de pacientes registrados en el sistema.
                            </div>-->
                        </div>
                    </div>    
                </div>
            </div> 
            <div class="main-card mb-3 card">
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
                                           <h5> <label for="validationCustom01">Nombre: </label> {{ paciente.nombre }}</h5>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Apellidos: </label>{{ paciente.apellidos }}
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Sexo: </label>{{paciente.sexo}}
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Fecha de nacimiento: </label>{{ paciente.fecha_nacimiento}}
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Telefono: </label>{{ paciente.telefono}}
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Médico:</label>{{paciente.medico+ ' '+ paciente.medico2}}
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingTwo" class="b-radius-0 card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Alergias y Padecimientos</h5></button>
                            </div>
                            <div data-parent="#accordion" id="collapseOne2" class="collapse">
                                <div class="card-body">2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                    nesciunt
                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                    VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingThree" class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Historial Clinico</h5></button>
                            </div>
                            <div data-parent="#accordion" id="collapseOne3" class="collapse">
                                <div class="card-body">3. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                    nesciunt
                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                    VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingThree" class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseFour" class="text-left m-0 p-0 btn btn-link btn-block"><h5 class="m-0 p-0">Comentarios</h5></button>
                            </div>
                            <div data-parent="#accordion" id="collapseOne4" class="collapse">
                                <div class="card-body">3. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                    nesciunt
                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                    VHS.
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
        }
    },//Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          
          //let uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/paciente/expediente/${this.$route.params.id}`;
          let uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/paciente/expediente/${this.$route.params.id}`;
          
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo paciente
          this.axios.get(uri).then(response => {
             this.paciente = response.data;
             console.log(this.paciente.nombre);
          });
          //Url directa del metodo en laravel que me obtiene valores de la bd
          uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/paciente/alergias/${this.$route.params.id}`;
          //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.ale = response.data;
          });

          //Url directa del metodo en laravel que me obtiene valores de la bd
          uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/paciente/padecimientos/${this.$route.params.id}`;
          //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.pad = response.data;
          });

          
          console.log(this.pad);
          console.log(this.ale);
          
    }, methods: {
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
        addPaciente(){
            this.paciente.id=(this.ultimo+1);
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = 'http://localhost/Alex/1730091-TAW-42/expedientes/public/api/paciente/create';
            console.log(this.paciente);
            this.axios.post(uri, this.paciente).then((response) => {
                this.$router.push({name: 'verpaciente'}); //vuelve a renderizar la tabla a la vista de la tabla
            });
        }
    }
  }
    

</script>