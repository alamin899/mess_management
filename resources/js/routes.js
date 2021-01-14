import adminDashboard from './components/admin/dashboard.vue'
import adminMaster from './components/admin/AdminMaster.vue'
import userIndex from './components/user/index.vue'
import userCreate from './components/user/create.vue'
export const routes = [
    { path: '/admin-dashboard', component: adminDashboard }, //dashboard
    { path: '/admin-master', component: adminMaster },

    // user management
    { path: '/user', component: userIndex },
    { path: '/user-create', component: userCreate },
]