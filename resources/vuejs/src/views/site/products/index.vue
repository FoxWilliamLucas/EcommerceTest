<template>
    <div class="container">
        <div class="d-flex flex-row flex-wrap mt-4">
            <div
                v-for="(product, i) in products"
                :key="i"
            >
                <ProductCard
                    :product="product"
                    class="mx-2"
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
    mounted(){
        this.getData();
    },
    methods: {
        getData(){
            this.$store.dispatch('site/products')
            .then((data) => {
                this.products = data.content
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