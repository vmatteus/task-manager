import axios from 'axios'

const API_URL = 'http://localhost:8080';

export default {
    create: async ({ commit }, user) => {
        axios
            .post(API_URL + '/api/user/find-or-create', {
                name: user.name,
                email: user.email
            })
            .then(() => {
                commit('SET_USER', {
                    name: user.name,
                    email: user.email,
                })
                commit('SET_USER_LOADED', true);
            })
    },
    load: async ({ commit }) => {
        axios
            .get(API_URL + '/api/tasks')
            .then(response => response.data)
            .then(items => {
                commit('SET_USER', items.data.user)
            })
    }
}
