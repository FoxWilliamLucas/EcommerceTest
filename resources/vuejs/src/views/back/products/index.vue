<template>
    <div class="container">
        <h1 class="text-center my-4">Our Products</h1>
        <router-link class="text-center" to="/products/add">
            <div><i class="fas fa-plus-square h1"></i></div>
        </router-link>
        <div class="d-flex flex-row flex-wrap mt-4">
            <div
                v-for="(product, i) in products"
                :key="i"
            >
                <ProductCard
                    @deleteProduct="deleteProduct"
                    :product="product"
                    class="m-2"
                />
            </div>
        </div>
    </div>
</template>

<script>
import ProductCard from '../../../components/cards/ProductCard';

export default {
    name: "products",
    components: {ProductCard},
    data: () => ({
        products: [],
    }),
    created(){
        this.getData();
    },
    methods: {
        getData(){
            this.$store.dispatch('products/index')
            .then((data) => {
                this.products = data.content
            })
            .catch(err => {
                this.notifyError(err.message)
            })
        },
        deleteProduct(id){
            this.products = this.products.filter((item) => item.id != id)
        }
    }
}
</script>

<style>

</style>