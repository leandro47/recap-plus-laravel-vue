import axios from 'axios'

export default {
    state: {
        client: {},
        errors: {data: null, status: null}
    },
    getters: {
        getClientError (state) {return state.errors},
        getClients (state) {return state.client},
    },
    mutations: {
        setErrors: (state, errors) => state.errors = errors,
        clearErrors: (state) => state.errors = {data: null, status: null},
        fetchClients: (state, data) => state.client = data,
    },
    actions: {
        async fetchClients({ commit }, payload) {
            await axios.get(`/api/list-client?page=${payload.page}&search=${payload.search}`)
                .then((data) => {
                    commit("fetchClients", data.data.data);
                }).catch((error) => {
                    commit("setErrors", error.response.data);
                });
        },
    }
}
