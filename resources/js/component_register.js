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
Vue.component('payment-head-create', require('./components/payment_head/create.vue').default);
Vue.component('payment-head-edit', require('./components/payment_head/edit.vue').default);

// Payment Schedule
Vue.component('payment-schedule-index', require('./components/payment_schedule/index.vue').default);
Vue.component('payment-schedule-list', require('./components/payment_schedule/schedule_list.vue').default);
Vue.component('payment-schedule-edit', require('./components/payment_schedule/edit.vue').default);

// payment collection
Vue.component('payment-collection-index', require('./components/payment_collection/index.vue').default);
Vue.component('payment-collection-create', require('./components/payment_collection/create.vue').default);

// meal
Vue.component('meal-index', require('./components/meal/index.vue').default);
Vue.component('meal-create', require('./components/meal/create.vue').default);


// pagination
Vue.component('pagination', require('./components/custome/pagination').default);