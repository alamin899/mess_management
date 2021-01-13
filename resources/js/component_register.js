                  /**  Component register  */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-dashboard', require('./components/admin/dashboard.vue').default);
Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default);

// User Management
Vue.component('user-index', require('./components/user/index.vue').default);
