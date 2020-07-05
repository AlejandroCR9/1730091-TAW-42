/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './components/App.vue';
Vue.use(VueAxios, axios);

import CreateComponent from './components/crearProducto.vue';
import IndexComponent from './components/TableComponent.vue';
import EditComponent from './components/editarProducto.vue';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//
//Vue.component('table-component', require('./components/TableComponent.vue').default);
//Vue.component('crear-component', require('./components/crearProducto.vue').default);
//Vue.component('editar-component', require('./components/editarProducto.vue').default);
//Vue.component('nav-component', require('./components/App.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const routes = [
    {
        name: 'crear',
        path: '/Alex/1730091-TAW-42/practicaL03072020Ventas/public/crear',
        component: CreateComponent
    },
    {
        name: 'tabla',
        path: '/Alex/1730091-TAW-42/practicaL03072020Ventas/public/',
        component: IndexComponent
    },
    {
        name: 'edit',
        path: '/Alex/1730091-TAW-42/practicaL03072020Ventas/public/edit/:id',
        component: EditComponent
    }
  ];

const router = new VueRouter({ mode: 'history', routes: routes});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
//const app = new Vue({
  //  el: '#app',
//});
