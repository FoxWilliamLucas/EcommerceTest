<template>
    <div class="container">
        <h1 class="text-center mt-2">Shopping Cart</h1>
        <div class="d-flex flex-column mt-4">
            <div
                v-for="(product, i) in products"
                :key="i"
            >
                <ProductCartCard
                    :product="product"
                />
            </div>
        </div>
        <hr>
        <div class="text-center">
            <h4>Total Price: {{total}}$</h4>
        </div>
        <div class="text-right">
            <button class="btn btn-danger" disabled>Proceed to Buy</button>
        </div>
    </div>
</template>

<script>
import ProductCartCard from '../../../components/cards/ProductCartCard';

export default {
    name: "cart",
    components: {ProductCartCard},
    data: () => ({}),
    computed:{
        products(){
            return this.$store.getters['cart/getProducts']
        },
        total(){
            return this.$store.getters['cart/getTotal']
        },
    },
    created(){
        this.getData();
    },
    methods: {
        getData(){
            this.$store.dispatch('cart/getProducts')
            .catch(err => {
                this.notifyError(err.message)
            })
    }
    }
}
</script>

<style>

</style>