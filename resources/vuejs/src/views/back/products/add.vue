<template>
    <div class="container">
        <ProductForm
            title='Add new Product'
            @sendForm="sendForm"
            :model="model"
        />
    </div>
</template>

<script>
import ProductForm from '../../../components/Forms/ProductForm'

export default {
    components: {ProductForm},
    name: 'add',
    data: () => ({
        model: {}
    }),
    methods:{
        sendForm(data){
           this.$store.dispatch('products/add', data)
            .then((data) => {
                this.$router.push({name: 'products'})
                this.notifySuccess(data.message)
            })
            .catch(err => {
                this.notifyError(err.message)
            })
        }
    }
}
</script>

<style>

</style>