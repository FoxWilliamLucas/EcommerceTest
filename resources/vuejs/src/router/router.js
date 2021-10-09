import Vue from 'vue';
import VueRouter from 'vue-router'
import Meta from 'vue-meta'
import store from '../store'

Vue.use(VueRouter)
Vue.use(Meta)


import AuthRoutes from '../views/auth/router.js'
import BackRoutes from '../views/back/router.js'
import SiteRoutes from '../views/site/router.js'


const routes = [
    ...AuthRoutes,
    ...BackRoutes,
    ...SiteRoutes,
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!store.getters.isAuth) {
        next({ name: 'login' })
      } else {
        next() // go to wherever I'm going
      }
    } else {
      next() // does not require auth, make sure to always call next()!
    }
})