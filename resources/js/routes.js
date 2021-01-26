import adminDashboard from './components/admin/dashboard'
import adminMaster from './components/admin/AdminMaster'
import userIndex from './components/user/index'
import userCreate from './components/user/create'
import userEdit from './components/user/edit'
import userPassUpdate from './components/user/password_change'
import paymentHeadIndex from './components/payment_head/index'
import paymentHeadCreate from './components/payment_head/create'
import paymentHeadEdit from './components/payment_head/edit'
export const routes = [
    { path: '/admin-dashboard', component: adminDashboard }, //dashboard
    { path: '/admin-master', component: adminMaster },

    // user management
    { path: '/user', component: userIndex },
    { path: '/user-create', component: userCreate },
    { path: '/user-edit/:user_id', component: userEdit },
    { path: '/user/:user_id/pass-change', component: userPassUpdate },

    // Payment Head
    { path: '/payment-head', component: paymentHeadIndex },
    { path: '/payment-head-create', component: paymentHeadCreate },
    { path: '/payment-head/:payment_head_id', component: paymentHeadEdit },
]