<template>
    <!--  For HomePage -->
    <div class="card product-card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <span class="badge badge-dark">{{product.price}}$</span><br/>
            </div>
            <div class="d-flex flex-row">
              <router-link class="text-right mr-2" :to="'/products/update/'+product.id">
                <div><i class="fas fa-edit h1"></i></div>
              </router-link>
              <div @click="deleteItem(product.id)"><i class="fas fa-times h1"></i></div>
            </div>
          </div>
          <h2 class="card-title text-center">{{product.name}}</h2>
          <p class="card-text h6">{{product.description}}</p>
          <div class="from control mt-4">
            <button class="btn btn-info" @click="addToCart(product.id)">Add To Cart</button>
          </div>
        </div>

        <span class="badge badge-light">
          <div class="d-flex flex-row justify-content-between">
            <div>last update</div>
            <div>{{product.updated_at}}</div>
          </div>
        </span>
    </div>
</template>

<script>
export default {
    name : "ProductCard",
    props : {
        product: {
            type: Object,
            default: ()=> ({})
        }
    },
    methods : {
      addToCart(id){
        this.$store.dispatch('cart/addToCart', id)
      },
      deleteItem(id){
        this.$store.dispatch('products/delete', id)
        .then((data) => {
            this.$emit('deleteProduct', id)
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
.card{
  width : 20rem;
  height : 24rem;
}
.product-card img:hover{
  cursor:pointer;
}
.product-card .name:hover{
  cursor:pointer;
}
p.name{
  font-family: 'Courgette', cursive;
  font-size : 30px;
}
</style>