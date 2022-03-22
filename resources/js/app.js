require('./bootstrap');

window.Vue = require('vue').default;

//vue form
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
// Vue.component(HasError.name, HasError);
// Vue.component(AlertError.name, AlertError);

//Bootstrap VUe
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap/dist/css/bootstrap.css';
Vue.use(BootstrapVue)

//vue router
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

//validate
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate, {
    inject: true,
    fieldsBagName: "veeFields",
    errorBagName: "veeErrors"
  })

let routes = [
    {path:'/dashboard', component:require('./components/Dashboard/Dashboard.vue').default},
    {path:'/berita', component:require('./components/Berita/Berita.vue').default},
    {path:'/create', component:require('./components/Berita/BeritaCreate.vue').default},
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
