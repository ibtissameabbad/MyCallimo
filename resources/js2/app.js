/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import Gate from "./Gate";
// I m making gate to be prototype for using anywhere in my application;
Vue.prototype.$gate = new Gate(window.user); // if current user is authenticated than we store info in window; 

// import moment from 'moment';
// import { Form, HasError, AlertError } from 'vform';
// import Swal from 'sweetalert2';

// window.Swal = Swal;

// window.Form = Form;


// /
// Global component: Can be accessed in any place in application;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('pagination', require('laravel-vue-pagination'));

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'

const options = {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '8px',
}

Vue.use(VueProgressBar, options)

const routes = [
  {
    path: '/home',
    component: Dashboard,
    
}
   
  
  
]


const router = new VueRouter({
  mode: 'history',
  routes // short for `routes: routes`
})

Vue.filter('upText', function(text){
	return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate', function(created) {
	return moment(created).format('MMMM Do YYYY');
});



window.Fire = new Vue(); // assigning fire to window means we can access it every where in our application;


Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
    'not-found',
    require('./components/NotFound.vue').default
);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data: {
      search: ''
    },
    methods: {
      // if someone searchs, this function will wait for 2 seconds and then be called automatically; 
      searchIt: _.debounce(() => {
        // Creating custom event with name searching & u can listen it anywhere in our app; 
        Fire.$emit('searching');
      }, 1000)
    },
});
