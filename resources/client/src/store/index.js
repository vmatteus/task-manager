import { createStore } from 'vuex'
import Tasks from './modules/Tasks'
import User from './modules/User'
import Login from './modules/Login'

const store =  createStore({
    modules: {
        Tasks,
        User,
        Login
    }
})

export default store
