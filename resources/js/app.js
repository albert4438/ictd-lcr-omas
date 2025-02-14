import '../sass/app.scss';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import { aliases, mdi } from 'vuetify/iconsets/mdi';
import '@mdi/font/css/materialdesignicons.css';
import 'vuetify/styles';
import router from './router';

// Import components
import WelcomePage from './components/WelcomePage.vue';
import AdminLogin from './components/admin/AdminLogin.vue';
import EmployeeLogin from './components/employee/EmployeeLogin.vue';

// Create Vuetify instance
const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        },
    },
    theme: {
        defaultTheme: 'light'
    }
});

const app = createApp({
    template: '<router-view></router-view>'
});

// Use Vuetify and Router
app.use(vuetify);
app.use(router);

// Register components globally
app.component('welcome-page', WelcomePage);
app.component('admin-login', AdminLogin);
app.component('employee-login', EmployeeLogin);

// Mount the app
app.mount('#app');