import Vue from 'vue';
import Vuex from 'vuex';
import promise from "promise"
import axios from "axios"

Vue.use(Vuex);


import products from './modules/products/store'
import cart from './modules/cart/store'
import site from './modules/site/store'





const store = new Vuex.Store({
    modules: {
        site,
        products,
        cart,
    },
    state: {
        user: localStorage.getItem("user"),
        token: localStorage.getItem("token"),
    },
    getters: {
        getToken(state){
            return state.token;
        },
        isAuth(state){
            return !!state.token;
        }
    },
    mutations: {
        setToken(state, token) {
            state.token = token;
        },
        setUser(state, user = {}) {
            state.user = user;
        },
    },
    actions: {
        logout(context) {
            return new promise((resolve, reject) => {
                axios.get('/auth/logout')
                    .then((res) => {
                        context.commit('setToken', null)
                        context.commit('setUser', null)
                        localStorage.removeItem("token")
                        delete axios.defaults.headers.common["Authorization"]
                        resolve(res.data)
                    })
                    .catch((errors)=>(reject(errors.response.data)));
            })

        },
        login(context, data){
            return new promise((resolve, reject) => {
                axios.post('/auth/login', data)
                    .then((res) => {
                        const data = res.data
                        if(data.code == 200){
                            const token = data.content.token
                            context.commit('setToken', token)
                            localStorage.setItem("token", token)
                            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`
                            resolve(data)
                        }
                        else{
                            reject(data)
                        }
                    })
                    .catch(function(errors){
                        reject(errors.response.data)
                    }
                );
            })
        },
        register(context, data){
            return new promise((resolve, reject) => {
                axios.post('/auth/register', data)
                    .then((res) => {
                        const data = res.data
                        if(data.code == 200){
                            resolve(data)
                        }
                        else{
                            reject(data)
                        }
                    })
                    .catch(function(errors){
                        reject(errors.response.data)
                    }
                );
            })
        }
    }
});

export default store