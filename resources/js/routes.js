import adminDashboard from './components/admin/dashboard.vue'
import adminMaster from './components/admin/AdminMaster.vue'
import userIndex from './components/user/index.vue'
export const routes = [
    { path: '/admin-dashboard', component: adminDashboard }, //dashboard
    { path: '/admin-master', component: adminMaster },

    // user management
    { path: '/user-index', component: userIndex },
]