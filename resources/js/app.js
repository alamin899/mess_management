
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


const app = new Vue({
    el: '#app',
    router,
    store,
});
