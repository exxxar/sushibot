<template>
    <div>
        <a href="#add_to_cart" class="btn_a btn_link" @click="add()"><i class="fas fa-plus"></i></a>
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
