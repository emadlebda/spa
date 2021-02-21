require('./bootstrap');

import Vue from "vue";
import VueRouter from "vue-router";

import routes from './routes'
import App from './components/App.vue';


Vue.use(VueRouter);
window.Vue = require('vue').default;

Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components: {App},
    router: new VueRouter(routes),
});
