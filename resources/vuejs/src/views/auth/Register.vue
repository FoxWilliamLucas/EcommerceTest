<template>
  <div class="container">
    <div class="row">
      <div class="col-12 justify-content-center d-flex flex-row pt-5">
        <div id="signup-div" class="flex-item border">
          <h2 class="pt-4 pl-4">Create Account</h2>
          <form @submit.prevent="signup" class="pt-4 pl-4 pr-4">
            <div class="form-group">
              <label>Name</label>
              <input type="name" class="form-control" v-model="data.name" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" v-model="data.email" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" v-model="data.password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2 py-0">Create Account</button>
          </form>
          <hr>
          <small class="form-text text-muted pt-2 pl-4 text-center">Already Have an Account?</small>
          <p class="text-center"><router-link class="btn btn-dark text-center mx-auto px-5 py-1 mb-2" :to="{name: 'login'}">Sign-In Here</router-link></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'sign-up',
  data: ()=>({
    data: {}
  }),
  methods: {
    signup(){
      this.$store.dispatch('register', this.data)
      .then((res) => {
          this.$router.push({name:'login'})
          this.notifySuccess(res.message)
      })
      .catch(err => {
          this.notifyError(err.message)
      })
    }
  }
}
</script>

<style>
.btn-dark {
  background-color: #e7e9ec;
  color: #000;
  font-size: smaller;
  border-radius: 0;
  border-color: #adb1b8 #a2a6ac #a2a6ac;
}

.btn-primary {
  background-color: #f0c14b;
  color: black;
  border-color: #a88734 #9c7e31 #846a29;
  border-radius: 0;
}

#logo {
  width: 150px;
}

@media only screen and (min-width: 992px) {
  #signup-div {
    width: 40%;
  }
}
</style>