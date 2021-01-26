                  /**  Component register  */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-dashboard', require('./components/admin/dashboard.vue').default);
Vue.component('admin-master', require('./components/admin/AdminMaster.vue').default);

// User Management
Vue.component('user-index', require('./components/user/index.vue').default);
Vue.component('user-create', require('./components/user/create.vue').default);
Vue.component('user-edit', require('./components/user/edit.vue').default);
Vue.component('user-password-change', require('./components/user/password_change.vue').default);

// Payment Head
Vue.component('payment-head-index', require('./components/payment_head/index.vue').default);


// pagination
Vue.component('pagination', require('./components/custome/pagination').default);