import Vue from 'vue'
import App from './App.vue'
import VueI18n from 'vue-i18n'
import router from './router/router.js'
import {BootstrapVue} from 'bootstrap-vue'
import store from './store'
import axios from './plugins/axios'
import VueAxios from 'vue-axios'
import Notifications from 'vue-notification'


import response from './mixin/response.vue'




import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.config.productionTip = false

Vue.use(BootstrapVue)
Vue.use(Notifications)
Vue.use(VueAxios, axios)

Vue.mixin(response)




new Vue({
  router,
  VueI18n,
  store,
  render: h => h(App),
}).$mount('#app')
