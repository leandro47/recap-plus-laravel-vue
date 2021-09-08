import axios from 'axios'

export default {
    state: {
        cities: [],
        errors: { data: null, status: null }
    },
    getters: {
        fetchCityError(state) { return state.errors },
        fetchCities(state) { return state.cities },
    },
    mutations: {
        setErrors: (state, errors) => state.errors = errors,
        clearErrors: (state) => state.errors = { data: null, status: null },
        fetchCities: (state, data) => state.cities = data,
        clearCities: (state) => state.cities = [],
    },
    actions: {
        async fetchCities({ commit }, stateid) {
            await axios.get(`/api/list-city/${stateid}`)
                .then((data) => {
                    commit("fetchCities", data.data.data);
                }).catch((error) => {
                    commit("setErrors", error.response.data);
                });
        },
    }
}
