<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h2>Insertar alergia</h2></div>

                    <div class="card-body">
                        <!--Metodo addalergia que se ejecuta una vez dado en el boton submit y que lleva los valores de los inputs al array alergia-->
                        <form @submit.prevent="addAlergia">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre alergia:</label>
                                        <!--v-model especifica a el nombre dle input-->
                                        <input type="text" class="form-control" v-model="alergia.nombre" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cantidad:</label>
                                        <!--v-model especifica a el nombre dle input-->
                                        <input type="number" min="0" class="form-control" v-model="alergia.descripcion" required>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <!--Boton que hace submit y manda los valores al array alergia-->
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
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
          alergia:{}
        }
    },
    methods: {
      addAlergia(){
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/alergia/create';
            this.axios.post(uri, this.alergia).then((response) => {
                this.$router.push({name: 'tabla'}); //vuelve a renderizar la tabla a la vista de la tabla
            });
        }
    }
  }
</script>
