import { createRouter, createWebHistory } from 'vue-router';
import AdminLogin from '../components/admin/AdminLogin.vue';
import AdminRegister from '../components/admin/AdminRegister.vue';
import EmployeeLogin from '../components/employee/EmployeeLogin.vue';
import WelcomePage from '../components/WelcomePage.vue';

const routes = [
    {
        path: '/',
        name: 'welcome',
        component: WelcomePage,
        meta: {
            title: 'Welcome - ICTD LCR OMAS'
        }
    },
    {
        path: '/admin/login',
        name: 'admin.login',
        component: AdminLogin,
        meta: {
            title: 'Administrator Login - ICTD LCR OMAS'
        }
    },
    {
        path: '/admin/register',
        name: 'admin.register',
        component: AdminRegister,
        meta: {
            title: 'Administrator Registration - ICTD LCR OMAS'
        }
    },
    {
        path: '/employee/login',
        name: 'employee.login',
        component: EmployeeLogin,
        meta: {
            title: 'Employee Login - ICTD LCR OMAS'
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

// Navigation guard to handle title changes
router.beforeEach((to, from, next) => {
    document.title = to.meta.title || 'ICTD LCR OMAS';
    next();
});

export default router;
