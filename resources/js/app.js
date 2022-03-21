require('./bootstrap');

window.Vue = require('vue').default;

//vue form
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
// Vue.component(HasError.name, HasError);
// Vue.component(AlertError.name, AlertError);


//vue router
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

let routes = [
    {path:'/dashboard', component:require('./components/Dashboard.vue').default},
    {path:'/berita', component:require('./components/Berita.vue').default},
    {path:'/kategori', component:require('./components/Kategori.vue').default},
    {path:'/image', component:require('./components/Image.vue').default},
    {path:'/video', component:require('./components/Video.vue').default}
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
