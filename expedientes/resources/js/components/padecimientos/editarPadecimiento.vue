<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h2>Insertar padecimiento</h2></div>

                    <div class="card-body">
                        <!--Metodo addpadecimiento que se ejecuta una vez dado en el boton submit y que lleva los valores de los inputs al array padecimiento-->
                        <form @submit.prevent="updatePadecimiento">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre padecimiento:</label>
                                        <!--v-model especifica a el nombre dle input-->
                                        <input type="text" class="form-control" v-model="padecimiento.nombre" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cantidad:</label>
                                        <!--v-model especifica a el nombre dle input-->
                                        <input type="number" min="0" class="form-control" v-model="padecimiento.descripcion" required>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <!--Boton que hace submit y manda los valores al array padecimiento-->
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

      data() {
        return {
          //NUestro array donde se almacenna los datos
          producto: {}
        }
      },
      //Funcion que se ejectua al crear el componente
      created() {
        //Url directa del metodo en laravel en el cual se obtiene el producto con el id que se le paso en una solicitud get
        let uri = `http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/producto/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.producto = response.data; //Recibe la repsuesta y actualiza el array de datos
        });
      },
      methods: {
        //Metodo para actualizar
        updateProducto() {
            //Url directa del metodo en laravel en el cual se mandan los datos nuevos del producto a la url especifica de laravel
          let uri = `http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/producto/update/${this.$route.params.id}`;
          this.axios.post(uri, this.producto).then((response) => {
            this.$router.push({name: 'tabla'}); //Renderiza otra vez al tabla 
          });
        }
      }
    }
</script>
