import axios from 'axios'

export default {
    state: {
        states: [],
        errors: { data: null, status: null }
    },
    getters: {
        fetchStateError(state) { return state.errors },
        fetchStates(state) { return state.states },
    },
    mutations: {
        setErrors: (state, errors) => state.errors = errors,
        clearErrors: (state) => state.errors = { data: null, status: null },
        fetchStates: (state, data) => state.states = data,
        clearState: (state) => state.states = {},
    },
    actions: {
        async fetchStates({ commit }) {
            await axios.get(`/api/list-state`)
                .then((data) => {
                    commit("fetchStates", data.data.data);
                }).catch((error) => {
                    commit("setErrors", error.response.data);
                });
        },
    }
}
