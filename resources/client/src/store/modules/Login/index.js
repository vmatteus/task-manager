import actions from './actions'
import mutations from './mutations'
import getters from './getters'

export default {
    namespaced: true,
    state: {
        user: {
            id: null,
            name: null,
            email: null,
        },
    },
    getters,
    actions,
    mutations,
}
