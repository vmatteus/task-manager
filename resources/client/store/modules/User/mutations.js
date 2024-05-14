const SET_USER = (state, user) => {
    state.user = user
}

const SET_USER_LOADED = (state, loaded) => {
    state.loaded = loaded
}

export default {
    SET_USER,
    SET_USER_LOADED
}
