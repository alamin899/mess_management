import adminDashboard from './components/admin/dashboard'
import adminMaster from './components/admin/AdminMaster'
import userIndex from './components/user/index'
import userCreate from './components/user/create'
import userEdit from './components/user/edit'
import userPassUpdate from './components/user/password_change'
import paymentHeadIndex from './components/payment_head/index'
import paymentHeadCreate from './components/payment_head/create'
import paymentHeadEdit from './components/payment_head/edit'
import paymentScheduleIndex from './components/payment_schedule/index'
import paymentScheduleCreate from './components/payment_schedule/create'
import mealIndex from './components/meal/index'
import mealCreate from './components/meal/create'
import paymentCollections from './components/payment_collection/index'
import paymentCollectionCreate from './components/payment_collection/create'
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

    // Payment Schedule
    { path: '/payment-schedule', component: paymentScheduleIndex },
    { path: '/payment-schedule-create', component: paymentScheduleCreate },

    // Meal
    { path: '/meal', component: mealIndex },
    { path: '/meal-create', component: mealCreate },

    // Payment Collection
    { path: '/payment-collection', component: paymentCollections },
    { path: '/payment-collection-create', component: paymentCollectionCreate },

]