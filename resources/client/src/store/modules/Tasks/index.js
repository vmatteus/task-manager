import actions from './actions'
import mutations from './mutations'
import getters from './getters'

export default {
    namespaced: true,
    state: {
        list: []
    },
    getters,
    actions,
    mutations,
}
