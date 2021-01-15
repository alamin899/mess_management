
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

const app = new Vue({
    el: '#app',
    router,
    store,
});
