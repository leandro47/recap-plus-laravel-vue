import Vue from 'vue'
import Vuex from 'vuex'

import UserModule from './modules/UserModule';

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
        UserModule
    }
})