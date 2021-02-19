import Vue from "vue";



require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('posts-index', require('./components/posts/index.vue').default);


const app = new Vue({
    el: '#app',
});
