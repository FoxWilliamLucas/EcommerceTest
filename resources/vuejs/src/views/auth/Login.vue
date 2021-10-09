<template>
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center d-flex flex-row pt-5">
                <div class="flex-item border">
                <h2 class="pt-4 pl-4">Sign-In</h2>
                <form @submit.prevent="login" class="pt-4 pl-4 pr-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="data.email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" v-model="data.password" required>
                    </div>
                    <small class="form-text text-muted">By continuing, you agree to our Conditions of Use and Privacy Notice.</small>
                    <button type="submit" class="btn btn-primary mt-2 py-0">
                        Continue
                    </button>
                </form>
                <hr>
                <small class="form-text text-muted pt-2 pl-4 text-center">New to Our Website?</small>
                    <p class="text-center">
                        <router-link :to="{name: 'register'}" class="btn btn-dark text-center mx-auto px-5 py-1 mb-2">
                            Create New Account
                        </router-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        data: {
            email: '',
            password: ''
        }
    }),
    methods: {
        login(){
            this.$store.dispatch('login', this.data)
            .then((res) => {
                this.$router.push({name:'home'})
                this.notifySuccess(res.message)
            })
            .catch(err => {
                this.notifyError(err.message)
            })
        },
    }
}
</script>

<style>

</style>