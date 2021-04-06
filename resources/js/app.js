require('./bootstrap');
import 'bootstrap';
// import index from './components/admin/login.vue';
// import 'bootstrap/dist/css/bootstrap.min.css';
// import 'es6-promise/auto';
// import auth from "./auth";
// import router from './router'
// import VueAuth from '@websanova/vue-auth/types/index'
// import VueAxios from 'vue-axios';
// Vue.use(VueAxios, axios)
// axios.defaults.baseURL = `http://127.0.0.1:8000/api`
// Vue.use(auth)
// Vue.use(VueAuth)
window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform';
import swal from 'sweetalert2'
window.swal = swal;



const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

window.Fire =  new Vue();
// Load Index
// Vue.component('index', index)


window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination', require('laravel-vue-pagination'));



import VueRouter from 'vue-router'

Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
import Vue from 'vue';

const options = {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '8px',
}

Vue.use(VueProgressBar, options)


const routes = [
  { path: '/admin', component: require('./components/admin/admin.vue').default },
  { path: '/profile', component: require('./components/admin/profile.vue').default },
  { path: '/territoires', component: require('./components/admin/territoire.vue').default },
  { path: '/annonces', component: require('./components/admin/annonces.vue').default },
  { path: '/users', component: require('./components/admin/Users.vue').default },
  { path: '/superviseur', component: require('./components/superviseur/superviseur.vue').default },
  { path: '/myTeam/superviseur/:id', component: require('./components/superviseur/myTeam.vue').default },
  { path: '/coller', component: require('./components/coller/coller.vue').default },
  { path: '/annonceprocessed', component: require('./components/coller/traiteAnnonce.vue').default },
  { path: '/secteurs', component: require('./components/admin/secteur.vue').default },
  { path: '/callannonce-:12', component: require('./components/coller/annonce_call.vue').default },
  { path: '/devloper', component: require('./components/devloper.vue').default },
  { path: '/sendMail', component: require('./components/coller/sendMail.vue').default },

]

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


const router = new VueRouter({
  mode: 'history',
  routes // short fsor `routes: routes`
})


 
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
