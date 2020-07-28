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
                        <div>Medicamentos
                            <div class="page-title-subheading">Listado de medicamentos registrados en el sistema.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>            
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Medicamentos
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Presentación</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(medicamento, num) in medicamentos" :key="medicamento.id">
                                    <td v-text="medicamento.id" class="text-center text-muted"></td>
                                    <td v-text="medicamento.nombre" class="text-center"> </td>
                                    <td v-text="medicamento.presentacion" class="text-center"> </td>
                                    <td v-text="medicamento.descripcion" class="text-center"></td>
                                    <td v-text="medicamento.percio" class="text-center"> </td>
                                    <td class="text-center">
                                         <!--Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                                        <router-link :to="{name: 'editmedicamento', params: { id: medicamento.id }}" class="btn btn-primary">Editar</router-link> <!--Etiqueta que nos redirecciona a la siguiente vista y la rendereiza en las etiquetas  <router-view></router-view> ubicadas en el compoente nav-->
                                        <!--Botón que borra la tarea que seleccionemos-->
                                        <button type="button" class="btn btn-danger" @click.prevent="deleteMedicamento(medicamento.id, num)" >Borrar</button>
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
      mounted() {
          if(this.$cookies.get("tipo")!=1){
              this.$router.go(-1);
          }
        },data() {
        return {
            //Array donde se guardarna los datos de la bd
            medicamentos: []
        }
      },
      //Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medicamento';

          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.medicamentos = response.data;
          });
    },
    methods: {
      deleteMedicamento(id, num)
      {
          //Url directa del metodo en larvave que me obtiene valores de la bd
        let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medicamento/delete/'+id;
         //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos y quita del array en la posicion especificada
        this.axios.delete(uri).then(response => {
          this.medicamentos.splice(num, 1); //Borra la fila en el indice dado
        });
      }
    }
  }
</script>