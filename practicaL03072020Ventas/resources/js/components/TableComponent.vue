<template>
    <!-- Contenido Principal -->
    <main class="main">
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Productos
                <!--Etiqueta que nos redirecciona a la siguiente vista y la rendereiza en las etiquetas  <router-view></router-view> ubicadas en el compoente nav-->
                <router-link :to="{ name: 'create' }"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button></router-link>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                    <thead> <!--Cabecera de la tabla-->
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> <!--Cuarpo de la tabla-->
                        <tr v-for="(producto, num) in productos" :key="producto.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                            <td v-text="producto.nombre"></td> <!--Se obtiene la propiedad nombre-->
                            <td v-text="producto.cantidad"></td><!--Se obtiene la propiedad cantidad-->
                            <td v-text="producto.precio"></td><!--Se obtiene la propiedad precio-->
                            <td>
                                <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                               <router-link :to="{name: 'edit', params: { id: producto.id }}" class="btn btn-primary"><i class="icon-pencil"></i>Editar</router-link> <!--Etiqueta que nos redirecciona a la siguiente vista y la rendereiza en las etiquetas  <router-view></router-view> ubicadas en el compoente nav-->
                               <!--Botón que borra la tarea que seleccionemos-->
                               <button type="button" class="btn btn-danger" @click.prevent="deleteProducto(producto.id, num)" ><i class="icon-trash"></i>Borrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    
</main>
<!-- /Fin del contenido principal -->
</template>

<script>
    export default {
      data() {
        return {
            //Array donde se guardarna los datos de la bd
            productos: []
        }
      },
      //Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/producto';

          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.productos = response.data;
          });
    },
    methods: {
      deleteProducto(id, num)
      {
          //Url directa del metodo en larvave que me obtiene valores de la bd
        let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/producto/delete/'+id;
         //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos y quita del array en la posicion especificada
        this.axios.delete(uri).then(response => {
          this.productos.splice(num, 1); //Borra la fila en el indice dado
        });
      }
    }
  }
</script>