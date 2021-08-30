import axios from 'axios'

export default {
    state: {
        client: {},
        errors: {data: null, status: null}
    },
    getters: {
        fetchClientError (state) {return state.errors},
    },
    mutations: {
        setErrors: (state, errors) => state.errors = errors,
        clearErrors: (state) => state.errors = {data: null, status: null},
    },
    actions: {
        async fetchClient({ commit }) {
            await axios.get("/api/list-client")
                .then((data) => {
                    console.log(data);
                }).catch((error) => {
                   console.error(error);
                });
        },
    }
}
