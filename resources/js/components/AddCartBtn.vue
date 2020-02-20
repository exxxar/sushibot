<template>
    <div>
        <a href="#add_to_cart" class="btn_a btn_link btn-add-to-cart" @click="add()"><i class="fas fa-plus"></i></a>
    </div>
</template>
<script>
    export default {
        props:["product_id"],
        data(){
            return {
                info: ''
            };
        },
        methods:{
            add:function() {
                console.log(this.product_id)
                axios
                    .get('api/test')
                    .then(response => (this.info = response.data));
            }
        }
    }
</script>
<style lang="scss">
    .food_grid_box .grid_inner_item .overlay_content a.btn_a.btn-add-to-cart {
        width: 100px;
        height: 100px;
        font-size: 56px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
