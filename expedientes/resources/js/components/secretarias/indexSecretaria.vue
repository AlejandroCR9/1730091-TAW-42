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
                        <div>Secretaria
                            <div class="page-title-subheading">Listado de secretarias registrados en el sistema.
                            </div>
                        </div>
                        <div class="page-title-actions">
                        <button type="button" class="btn-shadow mr-3 btn btn-dark" @click.prevent="generarPDF()">
                            <i class="pe-7s-download"></i>
                         </button>
                    </div>  
                    </div>    
                </div>
            </div>            
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Secretarias
                        </div>
                        <div class="table-responsive">
                            <div id="example1" class="datable">
                                <!--Se manda llamar el datatable con las configuraciones y seteamos metodo que catpura las acciones-->
                                <data-table v-bind="parametersTable1" @actionTriggered="handleAction"/>
                            </div>
                        </div>
                        <table id="medicos" class="mb-0 table table-borderless" style="display:none;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th colspan="4">MIS PACIENTES</th>
                                    <th></th>
                                    
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Domicilio</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(re) in secretarias" :key="re.id">
                                    <!--Se recuperan los medicamentos recetados en eesa cita-->
                                    <td v-text="re.id"></td>
                                    <td v-text="re.name"></td>
                                    <td v-text="re.apellidos"></td>
                                    <td v-text="re.domicilio"></td>
                                    <td v-text="re.cedula"></td>
                                    <td v-text="re.telefono"></td>
                                    <td v-text="re.email"></td>
                                    
                                </tr>
                            </tbody>
                        </table>
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
            if(this.$cookies.get("tipo")==3){
                this.$router.go(-1);
            }
        },
        data() {
            return {
                //Array donde se guardarna los datos de la bd
                secretarias: []
            }
        },
        computed:{
            //Configuramos nuestro datable
            parametersTable1(){
                return {
                    data: this.secretarias, //Array que se cargara
                    lang: "es", //Asignamos el idioma
                    actionMode: "multiple", //Columna individual paa cada accion
                    showDownloadButton: false, //Descarga de la tabla(da errores por eso se desactiva)
                    //Las sig. dos lineas son estilos
                    tableClass: "table table-striped", 
                    tableWrapper: "data-table-wrapper",
                    actions: ["edit", "delete"], //Acciones que tendra el datatable
                    //Corregimos los textos que veian por defecto en el idioma
                    text: {
                        searchText: "Buscar:",
                        paginationSearchButtonText: "Ir"
                    },
                    //Los identificadores que tendra la columna
                    columnKeys: [
                    "id",
                    "name",
                    "apellidos",
                    "domicilio",
                    "cedula",
                    "telefono",
                    "email"
                    ]
                };
            }
        },
        //Se ejecuta una cuando se crea el componente
        created() {
            this.cargar()
        },
        methods: {
            generarPDF(){
                var name="listasecretarias.pdf"
                let doc = new jsPDF("landscape");
                doc.autoTable({ 
                    theme: 'grid',
                    html: '#secre' 
                });
                
                doc.save(name);
            },
            cargar(){
                //Url directa del metodo en laravel que me obtiene valores de la bd
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/secretaria';

                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.secretarias = response.data;
                });
            },
            //Recibe las acciones de nuestras filas
            handleAction(actionName, data) {
                console.log(actionName, data);
                console.log(data.id)
                 switch(actionName) { //Verificamos que accion se presiono
                    case "edit":
                        this.$router.push({name: 'editsecretaria', params: { id: data.id } }); //va a la ventana de edicion
                        break;
                    case "delete":
                        this.confirmar(data.id); //borra el regisro
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
                    this.deleteSecretaria(id)
                    this.$swal.fire(
                    '¡Borrado!',
                    'Se borro el registro',
                    'success'
                    )
                }
                })
            },
            deleteSecretaria(id, num)
            {
                //Url directa del metodo en larvave que me obtiene valores de la bd
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/secretaria/delete/'+id;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos y quita del array en la posicion especificada
                this.axios.delete(uri).then(response => {
                    this.cargar()
                });
            }
        }
    }
</script>