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
                        <div>Receta
                            <div class="page-title-subheading">Esta creando una receta, en la parte de abajo se listaran los medicamentos que le vaya recetando.
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 

            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Receta</h5>
                    <form class="needs-validation" @submit.prevent="addMedi">
                        <input type="text" class="form-control" v-model="receta.idCita" hidden>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Medicamento:</label>
                                <select class="form-control col-md-6 col-sm-6" type="text" v-model="receta.idMedicamento" required> 
                                    <option v-for="(medicamento) in medicamentos" :key="medicamento.id" v-bind:value="medicamento.id" selected>{{ medicamento.nombre }}</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Dosis</label>
                                <input type="text" class="form-control" v-model="receta.dosis" placeholder="Describa la dosis en la que se tomara el medicamento" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Frecuencia</label>
                                <input type="text" class="form-control" v-model="receta.frecuencia" placeholder="Describa la frecuencia" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Duración</label>
                                <input type="text" class="form-control" v-model="receta.duracion" placeholder="Describa la duracion del tratamiento" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Via Administracion</label>
                                <input type="text" class="form-control" v-model="receta.viaAdministracion" placeholder="Describa la via donde se administrara" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="d-block text-center card-footer">
                            <button class="btn-wide btn btn-warning" @click.prevent="salir()">Salir</button>
                            <button class="btn-wide btn btn-success">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <table class="mb-0 table table-borderless">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Dosis</th>
                                    <th>Frecuencia</th>
                                    <th>Via</th>
                                    <th>Duracion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(re) in receta2" :key="re.id">
                                    <!--Se recuperan los medicamentos recetados en eesa cita-->
                                    <td v-text="re.nombremedicamento"></td>
                                    <td v-text="re.percio"></td>
                                    <td v-text="re.dosis"></td>
                                    <td v-text="re.frecuencia"></td>
                                    <td v-text="re.viaAdministracion"></td>
                                    <td v-text="re.duracion"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                //NUestro array donde se almacena los datos
            receta:{},
            receta2:{},
            medicamentos:{},
            }
        },//Se ejecuta una cuando se crea el componente
        created() {
            this.cargar()
            this.receta.idCita=this.$route.params.idcita
        }, 
        methods: {
            cargar(){
                //Url directa del metodo en laravel que me obtiene valores de la bd
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medicamento';
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.medicamentos = response.data;
                });

                //Url directa del metodo en laravel que me obtiene valores de la bd
                uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/receta/${this.$route.params.idcita}`;
                //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
                this.axios.get(uri).then(response => {
                    this.receta2 = response.data;
                });
            },
            addMedi(){
                //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/receta/create';
                console.log(this.receta);
                this.axios.post(uri, this.receta).then((response) => {
                    this.cargar(); //vuelve a renderizar la tabla a la vista de la tabla
                });
            },
            salir(){
                this.$swal.fire({
                    title: '¿Estás seguro?',
                    text: "Ya no se podra regresar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Continuar'
                }).then((result) => {
                    if (result.value) {
                        this.$router.push({name: 'vermiscitas' , params: { mis: 1 }}); 
                    }
                })
        
            }
        }
    }
    

</script>