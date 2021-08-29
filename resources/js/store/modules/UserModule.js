import axios from 'axios'

export default {
    state: {
        user: {},
        errors: {data: null, status: null}
    },
    getters: {
        fetchUserError (state) {return state.errors},
        fetchUser (state) {return state.user},
    },
    mutations: {
        setErrors: (state, errors) => state.errors = errors,
        clearErrors: (state) => state.errors = {data: null, status: null},
        fetchUser: (state, user) => state.user = user,
        clearUser: (state) => state.user = {},
    },
    actions: {
        async fetchUser({ commit }) {
            await axios.get("/api/user")
                .then((user) => {
                    commit("fetchUser", user.data);
                }).catch((error) => {
                   console.log('User not authenticated')
                });
        },
        async authUser({ commit }, dataObject) {
            commit("clearErrors");

            await axios.post("/api/login", dataObject)
                .then((user) => {
                    commit("fetchUser", user.data);
                })
                .catch((error) => {
                    commit("setErrors", error.response.data);
                });
        },
        async logoutUser({commit}) {
            commit("clearErrors");

            await axios.post('/api/logout').then(()=>{
                commit("clearUser");
            })
            .catch((error) => {
                commit("setErrors", error.response.data);
            });
        }
    }
}
