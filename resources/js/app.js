require('./bootstrap');

import Vue from "vue";
import VueRouter from "vue-router";
import VueSweetalert2 from "vue-sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';


import routes from './routes';
import App from './components/App.vue';



Vue.use(VueRouter);
Vue.use(VueSweetalert2);
window.Vue = require('vue').default;

Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components: {App},
    router: new VueRouter(routes),
});
