import {createApp} from 'vue'
import store from '../client/src/store'
import App from '../client/src/app.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import router from '../client/src/router'
import ElementPlus from 'element-plus'
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-green/theme.css'

createApp(App).
    use(router).
    use(store).
    use(ElementPlus).
    use(PrimeVue).
    use(VueAxios, axios).
    mount('#app');
