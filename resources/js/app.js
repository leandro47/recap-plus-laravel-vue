require('./bootstrap');
require('./config/toastr');

window.Vue = require('vue').default;

Vue.component('pagination', require('laravel-vue-pagination'));

import router from './router';
import store from './store/store';
import App from './layouts/App.vue';
import VueAxios from 'vue-axios';
import vSelect from "vue-select";
import VueSimpleAlert from "vue-simple-alert";

Vue.use(VueSimpleAlert);

const app = new Vue({
    router,
    store,
    VueAxios,
    vSelect,
    el: '#app',
    render: h => h(App)
});
