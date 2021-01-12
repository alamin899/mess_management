
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


const app = new Vue({
    el: '#app',
    router,
});
