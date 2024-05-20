import axios from 'axios'

const API_URL = import.meta.env.VITE_API_URL;

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
                ElNotification({
                    title: 'Success',
                    message: 'User created',
                    type: 'success',
                })
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
