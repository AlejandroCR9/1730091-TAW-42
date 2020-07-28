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
                        <div>Medicamento
                            <div class="page-title-subheading">Esta registrando una nuevo medicamento.
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Crear nuevo medicamento</h5>
                    <form class="needs-validation" @submit.prevent="addMedicamento">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" v-model="medicamento.nombre" placeholder="Escriba el nombre de la medicamento" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Presentación</label>
                                <input type="text" class="form-control" v-model="medicamento.presentacion" placeholder="Escriba la presentación de la medicamento" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Precio</label>
                                <input type="number" class="form-control" v-model="medicamento.percio" min=0 value=0 placeholder="Escriba el precio del medicamento" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02">Descripción</label>
                                <textarea name="text" v-model="medicamento.descripcion"  placeholder="Escriba la descripción de la medicamento" class="form-control" style="height: 200px;" required></textarea>
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
        mounted() {
          if(this.$cookies.get("tipo")!=1){
              this.$router.go(-1);
          }
        },data(){
        return {
            //NUestro array donde se almacena los datos
          medicamento:{}
        }
    },
    created() {
        let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medicamento/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.medicamento = response.data;
        });
    }, 
    methods: {
      validar(){
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        },
        addMedicamento(){
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medicamento/update/${this.$route.params.id}`;
            this.axios.post(uri, this.medicamento).then((response) => {
                this.$router.push({name: 'vermedicamento'}); //vuelve a renderizar la tabla a la vista de la tabla
            });
        }
    }
  }
    

</script>