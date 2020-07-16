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
                        <div>Paciente
                            <div class="page-title-subheading">Listado de pacientes registrados en el sistema.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>            
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Pacientes
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Apellidos</th>
                                    <th class="text-center">Domicilio</th>
                                    <th class="text-center">Fecha Nacimiento</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(paciente, num) in pacientes" :key="paciente.id">
                                    <td v-text="paciente.id" class="text-center text-muted"></td>
                                    <td v-text="paciente.nombre" class="text-center"> </td>
                                    <td v-text="paciente.apellidos" class="text-center"> </td>
                                    <td v-text="paciente.domicilio" class="text-center"> </td>
                                    <td v-text="paciente.fecha_nacimiento" class="text-center"></td>
                                    <td v-text="paciente.telefono" class="text-center"> </td>
                                    <td v-text="paciente.email" class="text-center"> </td>
                                    <td class="text-center">
                                        <!--<router-link :to="{name: 'genpaciente', params: { id: paciente.id }}" class="btn btn-primary">Generar Expediente</router-link> 
                                         Botón modificar, que carga los datos del formulario con la tarea seleccionada-->
                                        <router-link :to="{name: 'editpaciente', params: { id: paciente.id }}" class="btn btn-primary">Editar</router-link> <!--Etiqueta que nos redirecciona a la siguiente vista y la rendereiza en las etiquetas  <router-view></router-view> ubicadas en el compoente nav-->
                                        <!--Botón que borra la tarea que seleccionemos-->
                                        <button type="button" class="btn btn-danger" @click.prevent="deletePaciente(paciente.id, num)" >Borrar</button>
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
            pacientes: []
        }
      },
      //Se ejecuta una cuando se crea el componente
      created() {
          //Url directa del metodo en laravel que me obtiene valores de la bd
          let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente';

          //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
          this.axios.get(uri).then(response => {
             this.pacientes = response.data;
          });
    },
    methods: {
      deletePaciente(id, num)
      {
          //Url directa del metodo en larvave que me obtiene valores de la bd
        let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente/delete/'+id;
         //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos y quita del array en la posicion especificada
        this.axios.delete(uri).then(response => {
          this.pacientes.splice(num, 1); //Borra la fila en el indice dado
        });
      }
    }
  }
</script>