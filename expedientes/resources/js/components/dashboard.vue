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
                        <div>Dashboard
                            <div class="page-title-subheading">Sistema de expedientes.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>            
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Pacientes</div>
                                <div class="widget-subheading">Total de pacientes</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white" ><span v-text="cant1"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left" v-if="this.$cookies.get('tipo') == 1">
                                <div class="widget-heading">Secretarias</div>
                                <div class="widget-subheading">Total de Secretarias</div>
                            </div>
                            <div class="widget-content-left" v-if="this.$cookies.get('tipo') == 2">
                                <div class="widget-heading">Citas Totales</div>
                                <div class="widget-subheading">Total de Citas</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span v-text="cant2"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left" v-if="this.$cookies.get('tipo') == 1">
                                <div class="widget-heading">Médicos</div>
                                <div class="widget-subheading">Total de Medicos</div>
                            </div>
                            <div class="widget-content-left" v-if="this.$cookies.get('tipo') == 2">
                                <div class="widget-heading">Citas</div>
                                <div class="widget-subheading">Citas Pendientes</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span v-text="cant3"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                //Variables para la info del dashboard
                 cant1: 0,
                 cant2: 0,
                 cant3: 0,
            }
        },
        //Se ejecuta una cuando se crea el componente
        created() {
            //Se carga los recuentos dependiendo del tipo de usaurio logeado
            if(this.$cookies.get('tipo') == 1) //Admin
                this.cargar();
            else if(this.$cookies.get('tipo')==2)//Medico
                this.cargar2()
        },
        methods:{
             cargar(){
                //Url directa del metodo en laravel que me obtiene valores de la bd
                let uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/cantpacientes`;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.cant1 = response.data;
                });

                //Url directa del metodo en laravel que me obtiene valores de la bd
                uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/cantmedicos`;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.cant3 = response.data;
                });

                //Url directa del metodo en laravel que me obtiene valores de la bd
                uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/cantsecretarias`;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.cant2 = response.data;
                });
            },
            cargar2(){
                //Url directa del metodo en laravel que me obtiene valores de la bd
                let uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/cantmispacientes/${this.$cookies.get('id')}`;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.cant1 = response.data;
                });

                //Url directa del metodo en laravel que me obtiene valores de la bd
                uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/cantmiscitas/${this.$cookies.get('id')}`;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.cant3 = response.data;
                });

                //Url directa del metodo en laravel que me obtiene valores de la bd
                uri = `http://localhost/Alex/1730091-TAW-42/expedientes/public/api/cantmiscitastotales/${this.$cookies.get('id')}`;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.cant2 = response.data;
                });
            }

        }
    }
</script>