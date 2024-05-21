import axios from 'axios'

const API_URL = import.meta.env.VITE_API_URL;

export default {
    authenticate: async ({ commit }, user) => {
        axios
            .post(API_URL + '/api/authenticate', {
                name: user.name,
                email: user.email
            })
            .then(response => response.data)
            .then(items => {
                commit('SET_USER', items.data.user)
            })
    },
}
