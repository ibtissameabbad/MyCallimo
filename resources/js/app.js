/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);
import VueRouter from 'vue-router';
import Admin from './components/admin/Admin.vue';

Vue.use(VueRouter)



const routes = [

    {
        path : '/home',
        component : Admin,
        
    },
]

const router = new VueRouter({ routes})



// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
});
