<template>
    <div>
        <div class="row justify-content-center mb-5">
            <div class="col-sm-4" v-if="!isLogged">
                <vue-telegram-login
                        mode="callback"
                        telegram-login="isushibot"
                        @callback="telegramCallback"/>
            </div>
            <div class="col-sm-4" v-if="isLogged">
                <div class="form_group">
                    <input type="text" placeholder="Введите промокод" name="promocode"
                           class="form_control lottery-field">
                    <i class="fas fa-terminal"></i>
                </div>
            </div>

            <div class="col-sm-4" v-if="!hasPhone&&isLogged">
                <div class="form_group">
                    <input type="text" placeholder="Введите телефон" name="phone"
                           class="form_control lottery-field">
                    <i class="fas fa-phone"></i>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5" v-if="canStart">
            <div class="col-md-4">
                <button class="btn btn-info">Поехали</button>
            </div>
        </div>
        <ul class="lottery">
            <li class="lottery-item-wrapper wow slideInUp" v-if="!isLogged" v-for="n in 20">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp" v-if="isLogged" v-for="lottery_item in lottery_list">
                <div class="lottery-item">
                    <img :src="lottery_item.image_url"
                         :alt="lottery_item.title">
                </div>
            </li>



        </ul>
    </div>
</template>
<script>
    import {vueTelegramLogin} from 'vue-telegram-login'

    export default {

        data() {
            return {
                isLogged: false,
                hasPhone: false,
                canStart:false,
                promocode:null,
                lottery_list: []
            };
        },
        methods: {
            telegramCallback(user) {
                // gets user as an input
                // id, first_name, last_name, username,
                // photo_url, auth_date and hash
                console.log(user)

                this.isLogged = true;

                axios
                    .post('api/users/phone', {
                        chat_id: user.id
                    })
                    .then(response => {
                        this.hasPhone = response.data.hasPhone;

                        this.getCardsList()
                    });
            },
            getCardsList(){
                axios
                    .get('api/users/promo/list')
                    .then(response => {
                        this.lottery_list = response.data.card_list
                    });
            },
            checkValidPromo(){
                axios
                    .post('api/users/promo/validate',{
                        promocode:this.promocode
                    })
                    .then(response => {
                        console.log(response)
                        if (response.data.status=="success"){
                            //this.lottery_list =
                        }
                    });
            },
            openCard(id){
                axios
                    .get(`api/users/promo/check/${id}`)
                    .then(response => {
                        this.lottery_list = response.data
                    });
            }
        },
        components: {vueTelegramLogin},
    }
</script>

<style lang="scss">
    .lottery-field {
        border: 1px #dc3545 solid;
        border-radius: 0;
        padding: 10px;
        height: 50px;
        text-align: center;

        & + i {
            position: absolute;
            left: 31px;
            top: 17px;
            color: #dc3545;
        }
    }
</style>
