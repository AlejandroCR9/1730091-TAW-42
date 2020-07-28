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
                            <div class="page-title-subheading">Esta registrando una nuevo secretaria.
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Crear nuevo secretaria</h5>
                    <form class="needs-validation" @submit.prevent="addSecretaria">
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
                                <input type="text" class="form-control" v-model="secretaria.telefono" placeholder="Escriba el telefono de la secretaria" required>
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
                                <input type="password" class="form-control" v-model="secretaria.password" placeholder="Escriba la contraseña de la secretaria" required>
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
          ultimo:{}
        }
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
        addSecretaria(){
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/secretaria/create';
            this.axios.post(uri, this.secretaria).then((response) => {
                this.$router.push({name: 'versecretaria'}); //vuelve a renderizar la tabla a la vista de la tabla
            });
        }
    }
  }
    

</script>