import axios from 'axios'

export default {
    state: {
        user: {},
        errors: []
    },
    getters: {
        fetchUserError (state) {return state.errors},
        fetchUser (state) {return state.user},
    },
    mutations: {
        setErrors: (state, errors) => state.errors.push(errors),
        clearErrors: (state) => state.errors = [],
        fetchUser: (state, user) => state.user = user,
        clearUser: (state) => state.user = {},
    },
    actions: {
        async fetchUser({ commit }) {
            await axios.get("/api/user")
                .then((user) => {
                    commit("fetchUser", user.data);
                })
                .catch((error) => {
                    commit("setErrors", error.response);
                });
        },
        async authUser({ commit }, dataObject) {
            await axios.post("/api/login", dataObject)
                .then((user) => {
                    commit("fetchUser", user.data);
                    commit("clearErrors");
                })
                .catch((error) => {
                    commit("setErrors", error.response);
                });
        },
        async logoutUser({commit}) {
            await axios.post('/api/logout').then(()=>{
                commit("clearUser");
            })
            .catch((error) => {
                commit("setErrors", error.response);
            });
        }
    }
}
