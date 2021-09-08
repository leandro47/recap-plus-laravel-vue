import axios from 'axios'

export default {
    state: {
        client: {},
        clients: {},
        errors: { data: null, status: null }
    },
    getters: {
        getClientError(state) { return state.errors },
        getClients(state) { return state.clients },
        getClient(state) { return state.client },
    },
    mutations: {
        setErrors: (state, errors) => state.errors = errors,
        clearErrors: (state) => state.errors = { data: null, status: null },
        fetchClients: (state, data) => state.clients = data,
        fetchClient: (state, data) => state.client = data,
        storeClients: (state, data) => state.clients.data.unshift(data),
        destroyClient: (state, uuid) => {
            const index = state.clients.data.findIndex(client => client.uuid === uuid)
            state.clients.data.splice(index, 1)
        },
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
        async fetchClient({ commit }, uuid) {
            await axios.get(`/api/edit-client/${uuid}`)
                .then((data) => {
                    commit("fetchClient", data.data.data)
                })
                .catch(error => console.log(error))
        },
        async storeClient({ commit }, dataObject) {
            commit("clearErrors");
            await axios.post(`/api/store-client/`, dataObject)
                .then(data => {
                    commit("storeClients", data.data.data)
                })
                .catch(error => {
                    commit("setErrors", error.response.data);
                })
        },
        async destroyClient({ commit }, uuid) {
            await axios.delete(`/api/destroy-client/${uuid}`)
                .then((data) => {
                    commit("destroyClient", uuid)
                })
                .catch(error => {
                    commit("setErrors", error.response.data);
                })
        },
        async clearErrors({ commit }) {
            commit("clearErrors");
        }
    }
}
