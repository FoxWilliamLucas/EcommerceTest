<template>
    <div class="container">
        <ProductForm
            title ='Update Product Details'
            @sendForm="sendForm"
            :model="model"
        />
    </div>
</template>

<script>
import ProductForm from '../../../components/Forms/ProductForm'

export default {
    components: {ProductForm},
    name: 'update',
    data: () => ({
        model: {}
    }),
    mounted(){
        this.getData();
    },
    methods:{
        getData(){
           this.$store.dispatch('products/show', this.$route.params.id)
            .then((data) => {
                this.model = data.content
            })
            .catch(err => {
                this.notifyError(err.message)
            })            
        },
        sendForm(data){
           this.$store.dispatch('products/update', data)
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