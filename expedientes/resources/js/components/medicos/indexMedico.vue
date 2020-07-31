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
                        <div>Medico
                            <div class="page-title-subheading">Listado de medicos registrados en el sistema.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>            
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Medicos
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Apellidos</th>
                                    <th class="text-center">Domicilio</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(medico, num) in medicos" :key="medico.id">
                                    <td v-text="medico.id" class="text-center text-muted"></td>
                                    <td v-text="medico.name" class="text-center"> </td>
                                    <td v-text="medico.apellidos" class="text-center"> </td>
                                    <td v-text="medico.domicilio" class="text-center"> </td>
                                    <td v-text="medico.telefono" class="text-center"> </td>
                                    <td v-text="medico.email" class="text-center"> </td>
                                    <td class="text-center">
                                     
                                         <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                                        <router-link :to="{name: 'editmedico', params: { id: medico.id }}" class="btn btn-primary">Editar</router-link> <!--Etiqueta que nos redirecciona a la siguiente vista y la rendereiza en las etiquetas  <router-view></router-view> ubicadas en el compoente nav-->
                                        <!--Botón que borra la tarea que seleccionemos-->
                                        <button type="button" class="btn btn-danger" @click.prevent="deleteMedico(medico.id, num)" >Borrar</button>
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
            medicos: []
        }
      },
      //Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medico';

          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.medicos = response.data;
          });
    },
    methods: {
      deleteMedico(id, num)
      {
          //Url directa del metodo en larvave que me obtiene valores de la bd
        let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medico/delete/'+id;
         //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos y quita del array en la posicion especificada
        this.axios.delete(uri).then(response => {
          this.medicos.splice(num, 1); //Borra la fila en el indice dado
        });
      }
    }
  }
</script>