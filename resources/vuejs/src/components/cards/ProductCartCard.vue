<template>
    <!--  For HomePage -->
    <div class="card product-card my-1 pl-2" style="width: 80%;height: 10rem">
        <div class="card-body">
          <div class="row h-100">
            <div class="col-md-8">
              <h2 class="card-title">{{product.name}}</h2>
              <p class="card-text h4">{{product.description}}</p>
            </div>
            <div class="col-md-2 mt-4">
              <span class="badge badge-warning">{{product.price}}$</span>
              <br/>
              <input
                class="form-control mt-2"
                type="text"
                v-model="cart.find(x => x.product_id == product.id).quantity"
                @input="setLocalStorage()"
              >
              <br/>
            </div>
            <div @click="deleteItem(product.id)" class="col-md-2 h1 m-auto pl-4">
              <i class="fas fa-trash-alt"></i>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
export default {
    name : "ProductCartCard",
    props : {
        product: {
            type: Object,
            default: ()=> ({})
        }
    },
    data: () => ({}),
    computed:{
      cart(){
        return this.$store.getters['cart/getCart']
      },
    },
    methods : {
      deleteItem(id){
        this.$store.dispatch('cart/deleteFromCart', id)
      },
      setLocalStorage(){
        localStorage.setItem('cart', JSON.stringify(this.cart))
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