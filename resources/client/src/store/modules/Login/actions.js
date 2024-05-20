import axios from 'axios'

const API_URL = import.meta.env.VITE_API_URL;

export default {
    login: async ({ commit }, user) => {
        axios
            .post(API_URL + '/api/login', {
                name: user.name,
                email: user.email
            })
            .then(() => {

            })
    },
}
