require('./bootstrap');

window.Vue = require('vue').default;

//progress bar
import vueProgressbar from 'vue-progressbar';
Vue.use(vueProgressbar,{
    color: 'rgb(143,255,199)',
    failedColor: 'red',
    height: '5px'
})

//vue form
import { Form } from 'vform'
window.Form = Form

//tampilan validasi
import{HasError, AlertError} from 'vform/src/components/bootstrap5'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//refresh halaman otomatis
let Fire = new Vue();
window.Fire = Fire;

//vue router
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

//sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
});
window.Toast = Toast;

let routes = [
    {path:'/dashboard', component:require('./components/Dashboard/Dashboard.vue').default},
    {path:'/berita', component:require('./components/Berita/Berita.vue').default},
    {path:'/kategori', component:require('./components/Kategori/Kategori.vue').default},
    {path:'/image', component:require('./components/Image/Image.vue').default},
    {path:'/video', component:require('./components/Video/Video.vue').default}
]

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: "active",
    routes
})

const app = new Vue({
    el: '#app',
    router
});
