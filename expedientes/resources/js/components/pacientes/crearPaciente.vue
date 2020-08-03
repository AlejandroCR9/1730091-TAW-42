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
                        <div>Paciente
                            <div class="page-title-subheading">Esta registrando una nuevo paciente.
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Crear nuevo paciente</h5>
                    <form class="needs-validation" @submit.prevent="addPaciente">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" v-model="paciente.nombre" placeholder="Escriba el nombre de la paciente" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Apellidos</label>
                                <input type="text" class="form-control" v-model="paciente.apellidos" placeholder="Escriba los apellidos de la paciente" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Fecha de nacimiento</label>
                                <input type="date" class="form-control" v-model="paciente.fecha_nacimiento" placeholder="Escriba la fecha de nacimiento del paciente" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Telefono</label>
                                <input type="text" class="form-control" v-model="paciente.telefono" placeholder="Escriba el telefono de la paciente" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Correo</label>
                                <input type="text" class="form-control" v-model="paciente.email" placeholder="Escriba los apellidos de la paciente" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Médico:</label>
                                <select class="form-control col-md-6 col-sm-6" type="text" v-model="paciente.idMedico" required> 
                                    <option v-for="(medico) in medicos" :key="medico.id" v-bind:value="medico.id" selected>{{ medico.name }}</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Sexo:</label>
                                <select class="form-control col-md-6 col-sm-6" type="text" v-model="paciente.sexo" required> 
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div><!---->
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02">Domicilio</label>
                                <textarea name="text" v-model="paciente.domicilio"  placeholder="Escriba el domicilio de la paciente" class="form-control" style="height: 200px;" required></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        <div class="form-row">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>

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
          medicos:{},
          ultimo:{}
        }
    },//Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medico';
          //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.medicos = response.data;
          });

          //Url directa del metodo en laravel que me obtiene valores de la bd
          let url = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/pu';
          //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(url).then(response => {
             this.ultimo = response.data;
             //console.log(this.ultimo[0].id)
          });
          
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
            this.paciente.id=this.ultimo[0].id;
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/create';
            console.log(this.paciente);
            this.axios.post(uri, this.paciente).then((response) => {
                this.$router.push({name: 'verpaciente'}); //vuelve a renderizar la tabla a la vista de la tabla
            });
        }
    }
  }
    

</script>