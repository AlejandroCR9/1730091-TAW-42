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
                        <div>Secretaria
                            <div class="page-title-subheading">Esta editando una secretaria.
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Editando secretaria</h5>
                    <form class="needs-validation" @submit.prevent="updateSecretaria">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" v-model="secretaria.name" placeholder="Escriba el nombre de la secretaria" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Apellidos</label>
                                <input type="text" class="form-control" v-model="secretaria.apellidos" placeholder="Escriba los apellidos de la secretaria" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Cedula</label>
                                <input type="text" class="form-control" v-model="secretaria.cedula" placeholder="Escriba la cedula del secretaria" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Telefono</label>
                                <input type="text" class="form-control" maxlength="10" v-model="secretaria.telefono" placeholder="Escriba el telefono de la secretaria" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Usuario</label>
                                <input type=text class="form-control" v-model="secretaria.user" placeholder="Escriba la usuario de la secretaria" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Correo</label>
                                <input type="text" class="form-control" v-model="secretaria.email" placeholder="Escriba los correo de la secretaria" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Contraseña</label>
                                <input type="password" class="form-control" id="contra" placeholder="Escriba la contraseña de la secretaria">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02">Domicilio</label>
                                <textarea name="text" v-model="secretaria.domicilio"  placeholder="Escriba el domicilio de la secretaria" class="form-control" style="height: 200px;" required></textarea>
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
          if(this.$cookies.get("tipo")==3){
              this.$router.go(-1);
          }
        },data(){
        return {
            //NUestro array donde se almacena los datos
          secretaria:{},
        }
    },//Se ejecuta una cuando se crea el componente
      created() {
          //URL del API para obtener los datos de la secretaria a editar
          let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/secretaria/edit/${this.$route.params.id}`;
          this.axios.get(uri).then((response) => {
              this.secretaria = response.data; //Respuesta, se actualizan los campos con los valores
          });
          
    }, methods: {
        updateSecretaria(){
             //Para saber si se cambio la contra, si no se deja igual
            if(document.getElementById("contra").value!=""){
                this.secretaria.password=document.getElementById("contra").value;
            }
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/secretaria/update/${this.$route.params.id}`;
            this.axios.post(uri, this.secretaria).then((response) => {
                this.$swal.fire(
                        '¡Exito!',
                        'Se modifico correctamente',
                        'success'
                        )
                this.$router.push({name: 'versecretaria'}); //vuelve a renderizar la tabla a la vista de la tabla
            });
        }
    }
  }
    

</script>