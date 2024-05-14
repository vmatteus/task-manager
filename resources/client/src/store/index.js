import { createStore } from 'vuex'
import Tasks from './modules/Tasks'
import User from './modules/User'

const store =  createStore({
    modules: {
        Tasks,
        User
    }
})

export default store
