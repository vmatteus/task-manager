import axios from 'axios'

const API_URL = 'http://localhost:8080';

export default {
    create: async ({ dispatch }, task) => {
        axios
            .post(API_URL + '/api/task', {
                title: task.value,
                description: '...'
            })
            .then(() => {
                dispatch('load');
            })
    },
    load: async ({ commit }) => {
        axios
            .get(API_URL + '/api/tasks')
            .then(response => response.data)
            .then(items => {
                commit('SET_LIST', items.data.tasks)
            })
    },
    delete: async ({ dispatch }, id) => {
        axios
            .delete(API_URL + '/api/task/' + id)
            .then(() => {
                dispatch('load');
            })
    },

}
