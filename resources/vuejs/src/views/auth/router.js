import Login from './Login'
import Register from './Register'

export default [
    {
        path:"/login", 
        component: Login,
        name: 'login',
        meta: {
            requiresAuth: false
        }
    },
    {
        path:"/register", 
        component: Register,
        name: 'register',
        meta: {
            requiresAuth: false
        }
    }
]