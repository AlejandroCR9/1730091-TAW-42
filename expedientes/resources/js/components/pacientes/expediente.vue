<template>
    
</template>

<script>
    export default {
        data(){
            return {
                //NUestro array donde se almacena los datos
            paciente:{},
            medicos:{},
            }
        },//Se ejecuta una cuando se crea el componente
        created() {
            //Url directa del metodo en laravel que me obtiene valores de la bd
            let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/medico';
            //let uri = 'http://localhost/1730091-TAW-42/expedientes/public/api/medico';
            //Metodo que envia una solicitud a la url especificada y recibe una respuesta que se guarda en el arreglo productos
            this.axios.get(uri).then(response => {
                this.medicos = response.data;
            });
            paciente.idPaciente=this.$route.params.id;
        }, methods: {
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
        addExpediente(){
            //Url directa del metodo en laravel en el cual se manda el array con los datos almacenados mediante una solicitud post 
            let uri = 'http://161.35.13.32/Alex/1730091-TAW-42/expedientes/public/api/expediente/create';
            this.axios.post(uri, this.paciente).then((response) => {
                this.$router.push({name: 'verpaciente'}); //vuelve a renderizar la tabla a la vista de la tabla
            });
        }
    }
    }
</script>
