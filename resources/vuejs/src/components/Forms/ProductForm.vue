<template>
  <div>
        <h1>{{title}}</h1>
        <form @submit.prevent="submit">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>name</label>
                        <input class="form-control" type="text" v-model="model.name"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>description</label>
                        <textarea class="form-control" type="text" v-model="model.description"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>price</label>
                        <input class="form-control" type="text" v-model="model.price"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
  </div>
</template>

<script>
export default {
    name: "ProductForm",
    props:{
        model:{
            type: Object,
            default: () => ({})
        },
        title: {
            type: String,
            default: ''
        }
    },
    methods: {
        submit(){
            this.$emit('sendForm', this.model)
        }
    }
}
</script>

<style>

</style>