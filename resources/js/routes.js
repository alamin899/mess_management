import adminDashboard from './components/admin/dashboard'
import adminMaster from './components/admin/AdminMaster'
import userIndex from './components/user/index'
import userCreate from './components/user/create'
import userEdit from './components/user/edit'
export const routes = [
    { path: '/admin-dashboard', component: adminDashboard }, //dashboard
    { path: '/admin-master', component: adminMaster },

    // user management
    { path: '/user', component: userIndex },
    { path: '/user-create', component: userCreate },
    { path: '/user-edit/:user_id', component: userEdit },
]