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
                .catch(error => {
                    toastr["error"]("Problema ao buscar dados", "Aviso do Sistema")
                    commit("setErrors", error.response.data);
                })
        },
        async storeClient({ commit }, dataObject) {
            commit("clearErrors");
            await axios.post(`/api/store-client/`, dataObject)
                .then(data => {
                    toastr["success"]("Registro Incluido", "Aviso do Sistema");
                    commit("storeClients", data.data.data);
                })
                .catch(error => {
                    commit("setErrors", error.response.data);
                })
        },
        async destroyClient({ commit }, uuid) {
            await axios.delete(`/api/delete-client/${uuid}`)
                .then((data) => {
                    toastr["success"](data.data.data, "Aviso do Sistema");
                    commit("destroyClient", uuid);
                })
                .catch(error => {
                    toastr["error"](error.response.data, "Aviso do Sistema")
                    commit("setErrors", error.response.data);
                })
        },
        async updateClient({commit}, dataObject) {
            commit("clearErrors")
            await axios.put(`/api/update-client/${dataObject.uuid}`, dataObject)
                .then(data => {
                    toastr["info"]("Registro atualizado", "Aviso do Sistema");
                })
                .catch(error => {
                    commit("setErrors", error.response.data);
                })
        },
        async clearErrors({ commit }) {
            commit("clearErrors");
        },
    }
}
