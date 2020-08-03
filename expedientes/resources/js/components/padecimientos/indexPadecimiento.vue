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
                            <div id="example1" class="datable">
                                <!--Se manda llamar el datatable con las configuraciones y seteamos metodo que catpura las acciones-->
                                <data-table v-bind="parametersTable1" @actionTriggered="handleAction"/>
                            </div>
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
        },
        data() {
            return {
                //Array donde se guardarna los datos de la bd
                padecimientos: []
            }
        },
        computed:{
            parametersTable1(){
                return {
                    data: this.padecimientos, //Array que se cargara
                    lang: "es", //Asignamos el idioma
                    actionMode: "multiple", //Columna individual paa cada accion
                    showDownloadButton: false, //Descarga de la tabla(da errores por eso se desactiva)
                    //Las sig. dos lineas son estilos
                    tableClass: "table table-striped", 
                    tableWrapper: "data-table-wrapper",
                    actions: ["edit", "delete"], //acciones que tendra el datatable
                    //corregimos los textos que vienen por defecto
                    text: {
                        searchText: "Buscar:",
                        paginationSearchButtonText: "Ir"
                    },
                    //Identificadores de las columnas
                    columnKeys: [
                    "id",
                    "nombre",
                    "descripcion",
                    ]
                };
            }
        },
        //Se ejecuta una cuando se crea el componente
        created() {
            this.cargar();
        },
        methods: {
            cargar(){
                //Url directa del metodo en laravel que me obtiene valores de la bd
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/padecimiento';

                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.padecimientos = response.data;
                });
            },
            handleAction(actionName, data) {
                console.log(actionName, data);
                console.log(data.id)
                switch(actionName) {
                case "edit":
                    this.$router.push({name: 'editpadecimiento', params: { id: data.id } });
                    break;
                case "delete":
                    this.confirmar(data.id);
                }
            },
            confirmar(id){
                this.$swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esto no se revertira",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continuar'
                }).then((result) => {
                if (result.value) {
                    this.deletePadecimiento(id)
                    this.$swal.fire(
                    '¡Borrado!',
                    'Se borro el registro',
                    'success'
                    )
                }
                })
            },
            deletePadecimiento(id, num)
            {
                //Url directa del metodo en larvave que me obtiene valores de la bd
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/padecimiento/delete/'+id;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos y quita del array en la posicion especificada
                this.axios.delete(uri).then(response => {
                    this.cargar();
                });
            }
        }
  }
</script>