/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Vue = require('vue');
import VueRouter from 'vue-router'; //Import de la dependencia nesesaria para usar las rutas
Vue.use(VueRouter);

import VueAxios from 'vue-axios'; //Import de la dependecia para mandar los request
import axios from 'axios';
Vue.use(VueAxios, axios);

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

//Se crea el catalogo de rutas para cada compoente que tenemos
const routes = [
    {
        name: 'dash',
        path: '/Alex/1730091-TAW-42/expedientes/public/',
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
        name: 'crearpadecimientos',
        path: '/Alex/1730091-TAW-42/expedientes/public/padecimientos/crear',
        component: CreatePadecimientoComponent
    },
    {
        name: 'editpadecimientos',
        path: '/padecimientos/edit/:id',
        component: EditPadecimientoComponent
    }
  ];

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({ mode: 'history', routes: routes}); //Crea las rutas en modo history
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app'); //Agrega las rutas a la app y monta el sidebar
