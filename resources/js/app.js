
require('./bootstrap');
require('./component_register')

/** Vue Js **/
Window.Vue = require('vue');

/**  Vue Router  **/
import {routes}
from './routes'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
const router = new VueRouter({
    routes,
})

/**   VueX   **/
import Vuex from 'vuex'
Vue.use(Vuex)
import storeIndex from './store/index'
const store = new Vuex.Store(
    storeIndex
)

/**   VueJs Loader   **/
import Loading from 'vue-loading-overlay';
Vue.component('Loading',Loading)

/**   Start for vuejs vform for form validation   **/
import { Form, HasError, AlertError } from 'vform'
window.Form=Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

/**  sweet alert    **/
import Swal from 'sweetalert2'
window.Swal=Swal
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.toast=toast

/** Event **/
window.Event=new Vue();


const app = new Vue({
    el: '#app',
    router,
    store,
    toast,
});
