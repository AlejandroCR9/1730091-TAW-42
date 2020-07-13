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
                        <div>Alergias
                            <div class="page-title-subheading">Esta editando una alergia.
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Editar alergia</h5>
                    <form class="needs-validation" @submit.prevent="updateAlergia">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" class="form-control" v-model="alergia.nombre" placeholder="Escriba el nombre de la alergia" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom02">Descripción</label>
                                <textarea name="text" v-model="alergia.descripcion"  placeholder="Escriba la descripción de la alergia" class="form-control" style="height: 200px;" required></textarea>
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
            alergia:{}
            }
        }, 
        created() {
            let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/alergia/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.alergia = response.data;
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
            updateAlergia(){
                //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
                let uri = `http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/alergia/update/${this.$route.params.id}`;
                this.axios.post(uri, this.alergia).then((response) => {
                    this.$router.push({name: 'veralergia'}); //vuelve a renderizar la tabla a la vista de la tabla
                });
            }
        }
    }
    

</script>