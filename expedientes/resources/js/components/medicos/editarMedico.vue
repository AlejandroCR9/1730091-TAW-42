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
                        <div>Médico
                            <div class="page-title-subheading">Esta editando una medico.
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Editar medico</h5>
                    <form class="needs-validation" @submit.prevent="updateMedico">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" v-model="medico.name" placeholder="Escriba el nombre de la medico" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Apellidos</label>
                                <input type="text" class="form-control" v-model="medico.apellidos" placeholder="Escriba los apellidos de la medico" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Cedula</label>
                                <input type="text" class="form-control" v-model="medico.cedula" placeholder="Escriba la cedula del medico" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Telefono</label>
                                <input type="text" class="form-control" maxlength="10" v-model="medico.telefono" placeholder="Escriba el telefono de la medico" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Usuario</label>
                                <input type=text class="form-control" v-model="medico.user" placeholder="Escriba la usuario de la medico" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Correo</label>
                                <input type="text" class="form-control" v-model="medico.email" placeholder="Escriba los correo de la medico" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Contraseña</label>
                                <input type="password" class="form-control" id="contra" placeholder="Escribir contraseña nueva, dejar en blanco sin no hay cambio">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02">Domicilio</label>
                                <textarea name="text" v-model="medico.domicilio"  placeholder="Escriba el domicilio de la medico" class="form-control" style="height: 200px;" required></textarea>
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
        mounted() {
          if(this.$cookies.get("tipo")!=1){
              this.$router.go(-1); //Evita el acceso a otro user
          }
        },data(){
        return {
            //NUestro array donde se almacena los datos
          medico:{},
        }
    },//Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medico/edit/${this.$route.params.id}`;
          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.medico = response.data;
          });
          
    }, methods: {
        updateMedico(){
            //Para saber si se cambio la contra, si no se deja igual
           if(document.getElementById("contra").value!=""){
                this.medico.password=document.getElementById("contra").value;
            }
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medico/update/${this.$route.params.id}`;
            this.axios.post(uri, this.medico).then((response) => {
                this.$swal.fire(
                        '¡Exito!',
                        'Se creo correctamente',
                        'success'
                        )
                this.$router.push({name: 'vermedico'}); //vuelve a renderizar la tabla a la vista de la tabla
            });
        }
    }
  }
    

</script>