require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import {routes} from './routes.js';

Vue.use(VueRouter);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const router = new VueRouter({
	routes:routes,
	mode: 'history'
});

const app = new Vue({
    el: '#app',
    router,
});
