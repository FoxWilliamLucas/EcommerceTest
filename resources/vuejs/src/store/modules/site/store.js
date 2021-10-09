import promise from "promise"
import axios from "axios"

export default {
    namespaced: true,
    state: {
        products: []
    },
    getters: {
        getProducts(state){
            return state.products
        }
    },
    mutations: {
        setProducts(state, products){
            state.products = products
        }
    },
    actions: {
        products(context){
            return new promise((resolve, reject) => {
                axios.get('/site/products')
                    .then((res) => {
                        const data = res.data
                        if(data.code){
                            context.commit('setProducts', data.content)
                            resolve(res.data)
                        }else{
                            reject(res.data)
                        }
                    })
                    .catch((errors)=>(reject(errors.response.data)));
            })
        }
    }
}