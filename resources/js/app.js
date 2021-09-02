require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('pagination', require('laravel-vue-pagination'))

import router from './router';
import store from './store/store';
import App from './layouts/App.vue';
import VueAxios from 'vue-axios';

const app = new Vue({
    router,
    store,
    VueAxios,
    el: '#app',
    render: h => h(App)
});
