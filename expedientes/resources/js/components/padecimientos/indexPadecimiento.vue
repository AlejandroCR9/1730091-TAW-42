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
                            <div class="page-title-subheading">Listado de padecimientos registradas en el sistema.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>            
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Padecimientos
                            <!--<div class="btn-actions-pane-right">
                                <div role="group" class="btn-group-sm btn-group">
                                    <button class="active btn btn-focus">Last Week</button>
                                    <button class="btn btn-focus">All Month</button>
                                </div>
                            </div>-->
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(padecimiento, num) in padecimientos" :key="padecimiento.id">
                                    <td v-text="padecimiento.id" class="text-center text-muted"></td>
                                    <td v-text="padecimiento.nombre" class="text-center"> </td>
                                    <td v-text="padecimiento.descripcion" class="text-center"></td>
                                    <td class="text-center">
                                         <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                                        <router-link :to="{name: 'editpadecimiento', params: { id: padecimiento.id }}" class="btn btn-primary">Editar</router-link> <!--Etiqueta que nos redirecciona a la siguiente vista y la rendereiza en las etiquetas  <router-view></router-view> ubicadas en el compoente nav-->
                                        <!--Botón que borra la tarea que seleccionemos-->
                                        <button type="button" class="btn btn-danger" @click.prevent="deletePadecimiento(padecimiento.id, num)" >Borrar</button>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                        <!--<div class="d-block text-center card-footer">
                            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                            <button class="btn-wide btn btn-success">Save</button>
                        </div>-->
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
            //Array donde se guardarna los datos de la bd
            padecimientos: []
        }
      },
      //Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          let uri = 'localhost/Alex/1730091-TAW-42/expedientes/public/api/padecimiento';

          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.padecimientos = response.data;
          });
    },
    methods: {
      deletePadecimiento(id, num)
      {
          //Url directa del metodo en larvave que me obtiene valores de la bd
        let uri = 'localhost/Alex/1730091-TAW-42/expedientes/public/api/padecimiento/delete/'+id;
         //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos y quita del array en la posicion especificada
        this.axios.delete(uri).then(response => {
          this.padecimientos.splice(num, 1); //Borra la fila en el indice dado
        });
      }
    }
  }
</script>