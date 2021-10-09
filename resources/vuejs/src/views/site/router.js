import Products from './products/index'
import Cart from './cart/index'


export default [
    {
        path:"/", 
        component: Products,
        name: 'home',
        meta: {
            requiresAuth: false
        }
    },
    {
        path:"/cart", 
        component: Cart,
        name: 'cart',
        meta: {
            requiresAuth: false
        }
    },
]