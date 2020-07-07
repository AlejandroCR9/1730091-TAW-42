<template>
    <!-- Contenido Principal -->
    <main class="main">
    <!-- Breadcrumb -->
    <!--
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    -->
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Productos
                <router-link to="{ name: 'create' }"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button></router-link>
            </div>
            <div class="card-body">
                <!--
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-control col-md-3" id="opcion" name="opcion">
                            <option value="nombre">Nombre</option>
                            <option value="descripcion">Descripción</option>
                            </select>
                            <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                -->
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                         <!--<tr>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                <i class="icon-pencil"></i>
                                </button> &nbsp;
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">
                                <i class="icon-trash"></i>
                                </button>
                            </td>
                            <td>Equipos</td>
                            <td>Dispositivos electrónicos</td>
                            <td>
                                <span class="badge badge-success">Activo</span>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                <i class="icon-pencil"></i>
                                </button> &nbsp;
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">
                                <i class="icon-trash"></i>
                                </button>
                            </td>
                            <td>Equipos</td>
                            <td>Dispositivos electrónicos</td>
                            <td>
                                <span class="badge badge-secondary">Inactivo</span>
                            </td>
                        </tr>-->
                        <tr v-for="(producto, num) in productos" :key="producto.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                            <td v-text="producto.nombre"></td>
                            <td v-text="producto.cantidad"></td>
                            <td v-text="producto.precio"></td>
                            <td>
                                <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                               <router-link :to="{name: 'edit', params: { id: producto.id }}" class="btn btn-primary">Editar</router-link>
                               <!--Botón que borra la tarea que seleccionemos-->
                               <button type="button" class="btn btn-danger" @click.prevent="deletePost(post.id, num)" >Borrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
        <button type="button" class="btn" @click="showModal"></button>
    </div>
    
</main>
<!-- /Fin del contenido principal -->
</template>

<script>
    export default {
      data() {
        return {
            productos: []
        }
      },
      created() {
          let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/producto';
          this.axios.get(uri).then(response => {
             this.productos = response.data;
          });
    },
    methods: {
      deleteProducto(id, num)
      {
        let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/practicaL03072020Ventas/public/index.php/api/producto/delete/'+id;
        this.axios.delete(uri).then(response => {
          this.productos.splice(num, 1);
        });
      },
      showModal() {
        this.isModalVisible = true;
      }
    }
  }
</script>