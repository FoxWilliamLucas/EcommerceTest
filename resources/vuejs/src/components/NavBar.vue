<template>
  <nav class="navbar navbar-expand navbar-dark bg-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link class="btn btn-outline-secondary mx-2" :to="{name: 'home'}">home</router-link>
          <router-link class="btn btn-warning text-light mx-2" v-if="isAuth"  :to="{name: 'products'}">our products</router-link>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <router-link class="btn btn-light mx-2" v-if="!isAuth"  :to="{name: 'login'}">Log In</router-link>
        </li>
        <li class="nav-item dropdown">
            <router-link class="btn btn-light mx-2" v-if="!isAuth" :to="{name: 'register'}">Sign Up</router-link>
        </li>
        <li class="nav-item dropdown">
            <a class="btn btn-light mx-2"  href="#" v-if="isAuth" @click="signout">Sign Out</a>
        </li>
        <li class="nav-item">
          <router-link class="text-light" :to="{name : 'cart'}">
            <i class="fa fa-shopping-cart" style="font-size:36px"></i>
            <span class="badge badge-warning position-relative align-top">{{count}}</span>
          </router-link>
        </li>
      </ul>
  </nav>

</template>

<script>
export default {
  name : "Navbar",
  data() {
    return {
    }
  },
  computed:{
    isAuth(){
      return this.$store.getters.isAuth
    },
    count(){
      return this.$store.getters['cart/getCount']
    }
  },
  methods: {
    signout() {
      this.$store.dispatch('logout')
                .then((res) => {
                  this.$router.push({name:'login'})
                  this.notifySuccess(res.message)
                })
                .catch(err => {
                  this.notifyError(err.message)
                })
    },
  },
}
</script>

<style scoped>
  #logo {
    width: 150px;
    margin-left: 20px;
    margin-right: 20px;
  }

  .nav-link {
    color: rgba(255,255,255);
  }

  #search-button-navbar {
    background-color: #febd69;
    border-color: #febd69;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
  }
</style>
