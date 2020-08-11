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
                        <div>Padecimientos
                            <div class="page-title-subheading">Esta editando una padecimiento.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Editar padecimiento</h5>
                    <form class="needs-validation" @submit.prevent="updatePadecimiento">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" v-model="padecimiento.nombre" placeholder="Escriba el nombre de la padecimiento" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02">Descripción</label>
                                <textarea name="text" v-model="padecimiento.descripcion"  placeholder="Escriba la descripción de la padecimiento" class="form-control" style="height: 200px;" required></textarea>
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
              this.$router.go(-1); //Evita el acceso a la vista por parte de ciertos usaurios
          }
        },data(){
            return {
                //NUestro array donde se almacena los datos
            padecimiento:{}
            }
        }, 
        created() {
            //Solicurd de la infromacion a edirar
            let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/padecimiento/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.padecimiento = response.data;
            });
        },
        methods: {
            updatePadecimiento(){
                //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
                let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/padecimiento/update/${this.$route.params.id}`;
                this.axios.post(uri, this.padecimiento).then((response) => {
                    this.$swal.fire(
                        '¡Exito!',
                        'Se modifico correctamente',
                        'success'
                        )
                    this.$router.push({name: 'verpadecimiento'}); //vuelve a renderizar la tabla a la vista de la tabla
                });
            }
        }
    }
    

</script>