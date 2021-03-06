import Vue from 'vue'
import Vuex from 'vuex'

import UserModule from './modules/UserModule';
import ClientModule from './modules/ClientModule';
import StateModule from './modules/StateModule';
import CityModule from './modules/CityModule';
import FormPayment from './modules/FormPaymentModule';

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        errors: {}
    },
    getters: {
        errors: state => state.errors
    },
    mutations: {
        setErrors(state, errors) {
            state.errors = errors
        }
    },
    modules: {
        UserModule,
        ClientModule,
        StateModule,
        CityModule,
        FormPayment,
    }
})