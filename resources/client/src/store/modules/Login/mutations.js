const SET_USER = (state, user) => {
    state.user.id = user.id
    state.user.name = user.name
    state.user.email = user.email
}
export default {
    SET_USER
}
