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
import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css'

Vue.use(VueSimpleAlert);
Vue.use(Vuesax, {})

const app = new Vue({
    router,
    store,
    VueAxios,
    vSelect,
    el: '#app',
    render: h => h(App)
});
