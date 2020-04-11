require('./bootstrap');

window.Vue = require('vue');

import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;

import Gate from './policies/Gate';
Vue.prototype.$Gate = new Gate(window.user);

import router from "./routes/router.js"

const app = new Vue({
    el: '#app',
    router
});
