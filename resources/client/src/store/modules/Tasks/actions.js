import axios from 'axios'
import { utils } from '../../../utils';

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
                ElNotification({
                    title: 'Success',
                    message: 'Task created!',
                    type: 'success',
                })
            }).catch((msg) => {

                const { flattenJSON } = utils()

                ElNotification({
                    title: 'Error',
                    message: flattenJSON(msg.response.data.errors),
                    type: 'error',
                })
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
