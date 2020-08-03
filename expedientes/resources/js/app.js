/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 * //DB_PASSWORD=770056391dda2ccecf16b57f70a278120f81e8f74c571e94
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-cookies'));
import VueCookies from 'vue-cookies';
Vue.use(VueCookies);
import VueRouter from 'vue-router'; //Import de la dependencia nesesaria para usar las rutas
Vue.use(VueRouter);

import VueAxios from 'vue-axios'; //Import de la dependecia para mandar los request
import axios from 'axios';
Vue.use(VueAxios, axios);

import DataTable from '@andresouzaabreu/vue-data-table'
Vue.component("data-table", DataTable)
import '@andresouzaabreu/vue-data-table/dist/DataTable.css'

Vue.config.productionTip = false


//Importamos los componentes que tenemos
import App from './components/sidebar.vue'; //Contiene el componente de la navbar
import dashboard from './components/dashboard.vue'; //Contiene el componente de la ndash

//Alergias
import CreateAlergiaComponent from './components/alergias/crearAlergia.vue'; //Contiene el formulario para crear nuevos registros
import ViewAlergiaComponent from './components/alergias/indexAlergia.vue';//Contiene la tabla de alergia
import EditAlergiaComponent from './components/alergias/editarAlergia.vue'; //contiene el formularo para editar

//Padecimientoss
import CreatePadecimientoComponent from './components/padecimientos/crearPadecimiento.vue'; //Contiene el formulario para crear nuevos registros
import ViewPadecimientoComponent from './components/padecimientos/indexPadecimiento.vue';//Contiene la tabla de padecieminto
import EditPadecimientoComponent from './components/padecimientos/editarPadecimiento.vue'; //contiene el formularo para editar

//Medicamentos
import CreateMedicamentoComponent from './components/medicamentos/crearMedicamento.vue'; //Contiene el formulario para crear nuevos registros
import ViewMedicamentoComponent from './components/medicamentos/indexMedicamento.vue';//Contiene la tabla de padecieminto
import EditMedicamentoComponent from './components/medicamentos/editarMedicamento.vue'; //contiene el formularo para editar

//Paciente
import CreatePacienteComponent from './components/pacientes/crearPaciente.vue'; //Contiene el formulario para crear nuevos registros
import ViewPacienteComponent from './components/pacientes/indexPaciente.vue';//Contiene la tabla de padecieminto
import EditPacienteComponent from './components/pacientes/editarPaciente.vue'; //contiene el formularo para editar
import ViewExpedienteComponent from './components/pacientes/expediente.vue';//Contiene la tabla de paciente
import ViewMisPacientesComponent from './components/pacientes/mispacientes.vue';//Contiene la tabla de mis paciente para cada doc


//Secre
import CreateSecretariaComponent from './components/secretarias/crearSecretaria.vue'; //Contiene el formulario para crear nuevos registros
import ViewSecretariaComponent from './components/secretarias/indexSecretaria.vue';//Contiene la tabla de secre
import EditSecretariaComponent from './components/secretarias/editarSecretaria.vue'; //contiene el formularo para editar

//med
import CreateMedicoComponent from './components/medicos/crearMedico.vue'; //Contiene el formulario para crear nuevos registros
import ViewMedicoComponent from './components/medicos/indexMedico.vue';//Contiene la tabla de doc
import EditMedicoComponent from './components/medicos/editarMedico.vue'; //contiene el formularo para editar

Vue.component('nav-component', require('./components/sidebar.vue').default );
Vue.component('cal-component', require('./components/calendario.vue').default );
//Se crea el catalogo de rutas para cada compoente que tenemos
const routes = [
    {
        name: 'dash',
        path: '/Alex/1730091-TAW-42/expedientes/public/',
        component: dashboard
    },
    {
        name: 'dash2',
        path: '/Alex/1730091-TAW-42/expedientes/public/home',
        component: dashboard
    },//ALERGIAS
    {
        name: 'veralergia',
        path: '/Alex/1730091-TAW-42/expedientes/public/alergias',
        component: ViewAlergiaComponent
    },
    {
        name: 'crearalergia',
        path: '/Alex/1730091-TAW-42/expedientes/public/alergias/crear',
        component: CreateAlergiaComponent
    },
    {
        name: 'editalergia',
        path: '/Alex/1730091-TAW-42/expedientes/public/alergias/edit/:id',
        component: EditAlergiaComponent
    }, ///PADECIENTOS
    {
        name: 'verpadecimiento',
        path: '/Alex/1730091-TAW-42/expedientes/public/padecimientos',
        component: ViewPadecimientoComponent
    },
    {
        name: 'crearpadecimiento',
        path: '/Alex/1730091-TAW-42/expedientes/public/padecimientos/crear',
        component: CreatePadecimientoComponent
    },
    {
        name: 'editpadecimiento',
        path: '/Alex/1730091-TAW-42/expedientes/public/padecimientos/edit/:id',
        component: EditPadecimientoComponent
    }, ///MEDICAMENTOS
    {
        name: 'vermedicamento',
        path: '/Alex/1730091-TAW-42/expedientes/public/medicamentos',
        component: ViewMedicamentoComponent
    },
    {
        name: 'crearmedicamento',
        path: '/Alex/1730091-TAW-42/expedientes/public/medicamentos/crear',
        component: CreateMedicamentoComponent
    },
    {
        name: 'editmedicamento',
        path: '/Alex/1730091-TAW-42/expedientes/public/medicamentos/edit/:id',
        component: EditMedicamentoComponent
    }, ///PACIENTE
    {
        name: 'verpaciente',
        path: '/Alex/1730091-TAW-42/expedientes/public/pacientes',
        component: ViewPacienteComponent
    },
    {
        name: 'crearpaciente',
        path: '/Alex/1730091-TAW-42/expedientes/public/pacientes/crear',
        component: CreatePacienteComponent
    },
    {
        name: 'editpaciente',
        path: '/Alex/1730091-TAW-42/expedientes/public/pacientes/edit/:id',
        component: EditPacienteComponent
    },
    {
        name: 'verexpediente',
        path: '/Alex/1730091-TAW-42/expedientes/public/expediente/:id',
        component: ViewExpedienteComponent
    },
    {
        name: 'vermispacientes',
        path: '/Alex/1730091-TAW-42/expedientes/public/mispacientes',
        component: ViewMisPacientesComponent
    },
    {//SECRETARIA
        name: 'versecretaria',
        path: '/Alex/1730091-TAW-42/expedientes/public/secretaria',
        component: ViewSecretariaComponent
    },
    {
        name: 'crearsecretaria',
        path: '/Alex/1730091-TAW-42/expedientes/public/secretaria/crear',
        component: CreateSecretariaComponent
    },
    {
        name: 'editsecretaria',
        path: '/Alex/1730091-TAW-42/expedientes/public/secretaria/edit/:id',
        component: EditSecretariaComponent
    },
    {//MEDICO
        name: 'vermedico',
        path: '/Alex/1730091-TAW-42/expedientes/public/medicos',
        component: ViewMedicoComponent
    },
    {
        name: 'crearmedico',
        path: '/Alex/1730091-TAW-42/expedientes/public/medico/crear',
        component: CreateMedicoComponent
    },
    {
        name: 'editmedico',
        path: '/Alex/1730091-TAW-42/expedientes/public/medico/edit/:id',
        component: EditMedicoComponent
    }
  ];

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({ mode: 'history', routes: routes}); //Crea las rutas en modo history

$cookies.set("tipo",document.getElementById('a').value,"0");
$cookies.set("id",document.getElementById('i').value,"0");

var vm = new Vue({
    el: "#app",
    router,
})
//const app = new Vue(Vue.util.extend({ router }, App)); //Agrega las rutas a la app y monta el sidebar
