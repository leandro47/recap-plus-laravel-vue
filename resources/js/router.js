import Vue from 'vue';
import VueRouter from 'vue-router';

import Register from './pages/user/Register';
import Login from './pages/auth/Login';
import Dashboard from './pages/dashboard/Dashboard';
import Home from './pages/home/Home';
import NotFound from './pages/response/NotFound';
import AddClient from './pages/client/Add';
import EditClient from './pages/client/Edit';
import ListClient from './pages/client/List';

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
        return next({ name: 'login' })
    })
};

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
            beforeEnter: auth
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            beforeEnter: guest
        },
        {
            path: '/login',
            component: Login,
            name: 'login',
            beforeEnter: guest
        },
        {
            path: "/dashboard",
            name: "dashboard",
            component: Dashboard,
            beforeEnter: auth
        },
        {
            path: "/add-client",
            name: "add-client",
            component: AddClient,
            beforeEnter: auth
        },
        {
            path: "/list-client",
            name: "list-client",
            component: ListClient,
            beforeEnter: auth
        },
        {
            path: "/edit-client",
            name: "edit-client",
            component: EditClient,
            beforeEnter: auth
        },
        {
            path: '*',
            component: NotFound
        },
    ]
})

export default router