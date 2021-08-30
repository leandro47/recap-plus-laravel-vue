import axios from 'axios'

export default {
    state: {
        client: {},
        errors: {data: null, status: null}
    },
    getters: {
        fetchClientError (state) {return state.errors},
        listClient (state) {return state.client},
    },
    mutations: {
        setErrors: (state, errors) => state.errors = errors,
        clearErrors: (state) => state.errors = {data: null, status: null},
        listClient: (state, data) => state.client = data,
    },
    actions: {
        async fetchClient({ commit }) {
            await axios.get("/api/list-client")
                .then((data) => {
                    debugger;
                    commit("listClient", data.data);
                }).catch((error) => {
                    debugger;
                    commit("setErrors", error.response.data);
                });
        },
    }
}
