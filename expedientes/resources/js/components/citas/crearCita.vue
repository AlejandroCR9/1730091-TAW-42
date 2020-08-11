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
                        <div>Cita
                            <div class="page-title-subheading">Esta registrando una nueva cita.
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Crear nueva cita</h5>
                    <form class="needs-validation" @submit.prevent="addCita">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Paciente:</label>
                                <select class="form-control col-md-6 col-sm-6" type="text" v-model="cita.idPaciente" placeholder="Seleccione..." required>
                                    <option v-for="(paciente) in pacientes" :key="paciente.id" v-bind:value="paciente.id" selected>{{ paciente.nombre + " " + paciente.apellidos }}</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Fecha de la cita</label>
                                <!--Se establece la fecha de hoy como minimo en el input-->
                                <input type="datetime-local" :min="this.getHoy()" class="form-control col-md-6 col-sm-6" v-model="cita.fechaAsignada" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02">Observaciones</label>
                                <textarea name="text"  placeholder="Escriba las observaciones" class="form-control" maxlength="200" v-model="cita.observaciones" style="height: 200px;" required></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        <div class="form-row">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>

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
            cita:{},
            pacientes:{},
            }
        },//Se ejecuta una cuando se crea el componente
        created() {
            //Url directa del metodo en laravel que me obtiene valores de la bd
            let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/paciente';
            //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
            this.axios.get(uri).then(response => {
                this.pacientes = response.data;
            });
            console.log(this.getHoy())
          
        }, 
        methods: {
            //Obtener la fecha de hoy para que no haya citas con dias pasados
            getHoy(){
                var hoy = new Date() //Se obtiene la fecha de hoy
                var dia
                var mes
                //Se le da formato de dos digitos al dia
                if( hoy.getDate()<10){  
                    dia= "0"+hoy.getDate()
                }else{
                    dia= hoy.getDate()
                }
                //Se le da formato de dos digitos al mes
                if(hoy.getMonth()<10){
                    mes="0"+(hoy.getMonth()+1)
                }else{
                    mes=(hoy.getMonth()+1)
                }
                //Se regresa la concatenacion de todo
                return hoy.getFullYear()+"-"+mes+"-"+(dia)+"T00:00"
            },
            //AÑADE LA CITA
            addCita(){
                
                //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
                let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/cita/create';
                console.log(this.cita);
                this.axios.post(uri, this.cita).then((response) => {
                    //Si ya esciste la fecha y hora
                    if(response.data=="error"){
                        alert("La fecha y hora ya estan registradas")
                    }else{
                        this.$swal.fire(
                        '¡Exito!',
                        'Se creo correctamente',
                        'success'
                        )
                        if(this.$cookies.get("tipo")!=2){ //Si no es medico redirige a tdas las citas
                            this.$router.push({name: 'vercita'}); //vuelve a renderizar la tabla a la vista de la tabla
                        }else{
                            this.$router.push({name: 'vermiscitas' , params: { mis: 1 }}); //vuelve a renderizar la tabla a la vista de la tabla
                            
                        }
                    }
                });
            }
        }
    }
    

</script>