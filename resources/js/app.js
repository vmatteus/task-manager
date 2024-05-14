import {createApp} from 'vue'
import store from '../client/store'
import App from '../client/src/app.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

const app = createApp(App)
app.use(VueAxios, axios)
app.use(store)
app.mount("#app")
