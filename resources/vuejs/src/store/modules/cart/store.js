import promise from "promise"
import axios from "axios"


export default {
    namespaced: true,
    state: {
        cart: localStorage.getItem("cart")?JSON.parse(localStorage.getItem("cart")):[],
        products: []
    },
    getters: {
        getCart(state){
            return state.cart
        },
        getProducts(state){
            return state.products
        },
        getCount(state){
            return state.cart.length
        },
        getTotal(state){
            return state.products.map((item) => item.price * state.cart.find(x => x.product_id == item.id).quantity)
                                 .reduce((accumulator, curr) => accumulator + curr,0)
        },
    },
    mutations: {
        setCart(state, cart){
            localStorage.setItem("cart", JSON.stringify(cart))
            state.cart = cart
        },
        setProducts(state, products){
            state.products = products
        },
    },
    actions: {
        getProducts(context){
            return new promise((resolve, reject) => {
                const productsIds = context.getters.getCart.map(el => el.product_id)
                axios.get('site/cart/products', {params: {products: productsIds}})
                    .then((res) => {
                        const data = res.data
                        if(data.code == 200){
                            context.commit('setProducts', data.content)
                        }else{
                            reject(data)
                        }
                    })
                    .catch((errors)=>(reject(errors.response.data)));
            })
        },
        addToCart(context, product_id){
            let productIndex = context.state.cart.findIndex(e => e.product_id == product_id)
            if (productIndex < 0)
                context.state.cart.push({product_id: product_id,quantity: 1})
            else
                context.state.cart[productIndex].quantity += 1
            context.commit('setCart', context.state.cart)
        },
        deleteFromCart(context, product_id){
            const cart = context.state.cart.filter(el => el.product_id != product_id)
            const products = context.state.products.filter(el => el.id != product_id)
            context.commit('setCart', cart)
            context.commit('setProducts', products)
        },
    }
}