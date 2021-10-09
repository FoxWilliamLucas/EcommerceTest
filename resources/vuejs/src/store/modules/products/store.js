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
        index(context){
            return new promise((resolve, reject) => {
                axios.get('/back/products')
                    .then((res) => {
                        const data = res.data
                        if(data.code){
                            // context.commit('setProducts', data.content)
                            resolve(res.data)
                        }else{
                            reject(res.data)
                        }
                    })
                    .catch((errors)=>(reject(errors.response.data)));
            })
        },
        show(context, id){
            return new promise((resolve, reject) => {
                axios.get('/back/products/'+id)
                    .then((res) => {
                        const data = res.data
                        if(data.code){
                            resolve(res.data)
                        }else{
                            reject(res.data)
                        }
                    })
                    .catch((errors)=>(reject(errors.response.data)));
            })
        },
        add(context ,data){
            return new promise((resolve, reject) => {
                axios.post('/back/products/', data)
                    .then((res) => {
                        const data = res.data
                        if(data.code){
                            resolve(res.data)
                        }else{
                            reject(res.data)
                        }
                    })
                    .catch((errors)=>(reject(errors.response.data)));
            })
        },
        update(context ,data){
            return new promise((resolve, reject) => {
                axios.put('/back/products/'+data.id, data)
                    .then((res) => {
                        const data = res.data
                        if(data.code){
                            resolve(res.data)
                        }else{
                            reject(res.data)
                        }
                    })
                    .catch((errors)=>(reject(errors.response.data)));
            })
        },
        delete(context , id){
            return new promise((resolve, reject) => {
                axios.delete('/back/products/'+id)
                    .then((res) => {
                        const data = res.data
                        if(data.code){
                            resolve(res.data)
                        }else{
                            reject(res.data)
                        }
                    })
                    .catch((errors)=>(reject(errors.response.data)));
            })
        },
    }
}