require('./bootstrap');
window.Vue = require('vue');
// import support markdown editor
import 'v-markdown-editor/dist/index.css';
import Editor from 'v-markdown-editor'
Vue.use(Editor);
// suport Vuex
import Vuex from 'vuex'
Vue.use(Vuex)
    // store of vuex
import storeData from './store/index'
const store = new Vuex.Store(
        storeData
    )
    // import momentjs
import { filter } from './filter'

import VueRouter from 'vue-router';
Vue.use(VueRouter);
import { routes } from './routes.js';

//use component master
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);


//v-form
import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;
// ES6 Modules or TypeScript of Sweetalert 2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast;

const router = new VueRouter({
    routes,
    mode: 'hash',
})

const app = new Vue({
    el: '#app',
    router,
    store
})