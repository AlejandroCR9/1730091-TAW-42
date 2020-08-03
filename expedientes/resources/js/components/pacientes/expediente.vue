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
                </div>
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
                                <div class="card-header">
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
                                <div class="card-body">3. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                    nesciunt
                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                    VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingFour" class="card-header">
                                <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseFour" class="text-left m-0 p-0 btn btn-link btn-block"><h3 class="m-0 p-0">Comentarios</h3></button>
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
          let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/expediente/${this.$route.params.id}`;
          
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo paciente
          this.axios.get(uri).then(response => {
             this.paciente = response.data;
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
        hola(){
            this.$swal.fire({
                title: 'No disponible',
                text: "Aun no",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                
                })
        }
    }
  }
    

</script>