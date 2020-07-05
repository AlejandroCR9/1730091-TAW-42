<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h2>Editar producto</h2></div>

                    <div class="card-body">
                        <form @submit.prevent="updateProducto">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre Producto:</label>
                                        <input type="text" class="form-control" v-model="producto.nombre" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cantidad:</label>
                                        <input type="number" min="0" class="form-control" v-model="producto.cantidad" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Precio:</label>
                                        <input type="number" min="0" class="form-control" v-model="producto.precio" required>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
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
          producto: {}
        }
      },
      created() {
        let uri = `http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/producto/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.producto = response.data;
        });
      },
      methods: {
        updateProducto() {
          let uri = `http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/producto/update/${this.$route.params.id}`;
          this.axios.post(uri, this.producto).then((response) => {
            this.$router.push({name: 'tabla'});
          });
        }
      }
    }
</script>
