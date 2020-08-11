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
                            <div class="page-title-subheading">Esta registrando una nuevo medico.
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Crear nuevo medico</h5>
                    <form class="needs-validation" @submit.prevent="addMedico">
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
                                <input type="text" class="form-control" v-model="medico.telefono" placeholder="Escriba el telefono de la medico" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Usuario</label>
                                <input type=text class="form-control" maxlength="10" v-model="medico.user" placeholder="Escriba la usuario de la medico" required>
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
                                <input type="password" class="form-control" v-model="medico.password" placeholder="Escriba la contraseña de la medico" required>
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
              this.$router.go(-1); //Eviga el acceso de otros users
          }
        },data(){
        return {
            //NUestro array donde se almacena los datos
          medico:{},//Info del medico
        }
    }, methods: {
        addMedico(){
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medico/create';
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