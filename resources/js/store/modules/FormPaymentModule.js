import axios from 'axios'

export default {
    state: {
        formPayment: {},
        formPayments: {},
        errors: { data: null, status: null }
    },
    getters: {
        getFormPaymentError(state) { return state.errors },
        getFormPayments(state) { return state.formPayments },
        getFormPayment(state) { return state.formPayment },
    },
    mutations: {
        setErrors: (state, errors) => state.errors = errors,
        clearErrors: (state) => state.errors = { data: null, status: null },
        fetchFormPayments: (state, data) => state.formPayments = data,
        fetchFormPayment: (state, data) => state.formPayment = data,
        storeFormPayment: (state, data) => state.formPayments.data.unshift(data),
        destroyFormPayment: (state, uuid) => {
            const index = state.formPayments.data.findIndex(formPayment => formPayment.uuid === uuid)

            state.formPayments.data.splice(index, 1)
        },
    },
    actions: {
        async fetchFormPayments({ commit }, payload) {
            await axios.get(`/api/list-formpayment?page=${payload.page}&search=${payload.search}`)
                .then((data) => {
                    commit("fetchFormPayments", data.data.data);
                }).catch((error) => {
                    commit("setErrors", error.response.data);
                });
        },
        async fetchFormPayment({ commit }, uuid) {
            await axios.get(`/api/edit-formpayment/${uuid}`)
                .then((data) => {
                    commit("fetchFormPayment", data.data.data)
                })
                .catch(error => {
                    toastr["error"]("Problema ao buscar dados", "Aviso do Sistema")
                    commit("setErrors", error.response.data);
                })
        },
        async storeFormPayment({ commit }, dataObject) {
            commit("clearErrors");
            await axios.post(`/api/store-formpayment/`, dataObject)
                .then(data => {
                    toastr["success"]("Registro Incluido", "Aviso do Sistema");
                    commit("storeFormPayment", data.data.data);
                })
                .catch(error => {
                    commit("setErrors", error.response.data);
                })
        },
        async destroyFormPayment({ commit }, uuid) {
            await axios.delete(`/api/delete-formpayment/${uuid}`)
                .then((data) => {
                    toastr["success"](data.data.data, "Aviso do Sistema");
                    commit("destroyFormPayment", uuid);
                })
                .catch(error => {
                    toastr["error"](error.response.data, "Aviso do Sistema")
                    commit("setErrors", error.response.data);
                })
        },
        async updateFormPayment({commit}, dataObject) {
            commit("clearErrors")
            await axios.put(`/api/update-formpayment/${dataObject.uuid}`, dataObject)
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
