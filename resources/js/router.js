import Vue from 'vue';
import VueRouter from 'vue-router';

import Register from './pages/user/Register';
import Login from './pages/auth/Login';
import Dashboard from './pages/dashboard/Dashboard';
import NotFound from './pages/response/NotFound';

Vue.use(VueRouter);

const guest = (to, form, next) => {
    axios.get('/api/athenticated').then(() => {
        next("/");
    }).catch(() => {
        return next();
    })
};

const auth = (to, form, next) => {
    axios.get('/api/athenticated').then(() => {
        next()
    }).catch(() => {
        return next({ name: 'Login' })
    })
};

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: "/",
            name: "Home",
            component: Dashboard,
            beforeEnter: auth
        },
        {
            path: '/register',
            name: 'Register',
            component: Register,
            beforeEnter: guest
        },
        {
            path: '/login',
            component: Login,
            name: 'Login',
            beforeEnter: guest
        },
        {
            path: "/dashboard",
            name: "Dashboard",
            component: Dashboard,
            beforeEnter: auth
        },
        {
            path: '*',
            component: NotFound
        },
    ]
})

export default router