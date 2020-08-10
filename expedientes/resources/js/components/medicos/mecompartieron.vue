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
                        <div>Expedientes compartidos
                            <div class="page-title-subheading">Listado de expedientes compartidos.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>            
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Expedientes
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
        data() {
            return {
                //Array donde se guardarna los datos de la bd
                exp: [],
            }
        },
        computed:{
            //Configuramos nuestro datable
            parametersTable1(){
                return {
                    data: this.exp, //Array que se cargara
                    lang: "es", //Asignamos el idioma
                    actionMode: "multiple", //Columna individual paa cada accion
                    showDownloadButton: false, //Descarga de la tabla(da errores por eso se desactiva)
                    //Las sig. dos lineas son estilos
                    tableClass: "table table-striped", 
                    tableWrapper: "data-table-wrapper",
                    actions: ["view"], //Acciones que tendra el datatable
                    //Corregimos los textos que veian por defecto en el idioma
                    text: {
                        searchText: "Buscar:",
                        paginationSearchButtonText: "Ir"
                    },
                    //Los identificadores que tendra la columna
                    columnKeys: [
                    "id",
                    "nombremedico",
                    "apellidosmedico",
                    "expediente",
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
                let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/mecompartieron/${this.$cookies.get('id')}`;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.exp = response.data;
                });
            },
           //Recibe las acciones de nuestras filas
            handleAction(actionName, data) {
                console.log(actionName, data);
                console.log(data.id)
                 switch(actionName) { //Verificamos que accion se presiono
                    case "view":
                        this.$router.push({name: 'verexpediente', params: { id: data.expediente }}); //va al expediente de la persona
                        break;
                }
            },
            confirmar(id){
                this.$swal.fire({
                    title: '¿Cancelar compartido?',
                    text: "Esto no se revertira",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continuar'
                }).then((result) => {
                    if (result.value) {
                        this.deletePaciente(id)
                        this.$swal.fire(
                        '¡Borrado!',
                        'Se borro el registro',
                        'success'
                        )
                    }
                })
            },
            deletePaciente(id)
            {
                //Url directa del metodo en larvave que me obtiene valores de la bd
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/miscompartidos/delete/'+id;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos y quita del array en la posicion especificada
                this.axios.delete(uri).then(response => {
                    this.cargar();
               
                });
            }
        }
    }
</script>