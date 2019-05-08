
require('./bootstrap');

window.Vue = require('vue');
//support editor
import 'v-markdown-editor/dist/index.css';
import Editor from 'v-markdown-editor'
Vue.use(Editor);
//support momment  
import {filter} from './filter'
//vuex
import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from './store/index'

const store = new Vuex.Store(
  storeData
)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import { routes } from './routes';
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

//v-form
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});


window.Toast = Toast
const router = new VueRouter({
    routes,
    mode:'hash' // short for `routes: routes`
  })

const app = new Vue({
    el: '#app',
    router,
    store,
});
