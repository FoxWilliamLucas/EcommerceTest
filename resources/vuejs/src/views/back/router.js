import Products from './products/index'
import Add from './products/add'
import Update from './products/update'

export default [
    {
        path: "/products", 
        component: Products,
        name: 'products',
        meta: {
            requiresAuth: true
        },
    },{
        path: "/products/add", 
        component: Add,
        name: 'add-product',
        meta: {
            requiresAuth: true
        }
    },{
        path: "/products/update/:id", 
        component: Update,
        name: 'update-product',
        meta: {
            requiresAuth: true
        }
    }
]