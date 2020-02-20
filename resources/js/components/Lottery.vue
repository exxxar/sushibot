<template>
    <div>
        <notifications group="info"/>
        <div class="row justify-content-center mb-5">
            <div class="col-sm-4" v-if="!isLogged">
                <vue-telegram-login
                        mode="callback"
                        telegram-login="isushibot"
                        @callback="telegramCallback"/>
            </div>
            <div class="col-sm-4" v-if="isLogged">
                <div class="form_group">
                    <input type="text" placeholder="Введите промокод" name="promocode" v-model="promocode"
                           class="form_control lottery-field">
                    <i class="fas fa-terminal"></i>
                </div>
            </div>

            <div class="col-sm-4" v-if="!hasPhone&&isLogged">
                <div class="form_group">
                    <input type="text" placeholder="Введите телефон" name="phone" v-model="phone"
                           class="form_control lottery-field">
                    <i class="fas fa-phone"></i>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5" v-if="canStart">
            <div class="col-md-4">
                <button class="btn btn-info btn-lottery" @click="checkValidPromo">Поехали</button>
            </div>
        </div>
        <transition-group name="flip-list" tag="ul" class="lottery" v-if="!isLogged||lottery_list.length==0">
            <li class="lottery-item-wrapper wow slideInUp" v-for="n in demo_lottery_list" v-bind:key="n" :data-id="n">
                <div class="lottery-item" @click="openCard()">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>
        </transition-group>

        <ul class="lottery" v-if="isLogged&&lottery_list.length>0">
            <li class="lottery-item-wrapper wow slideInUp"
                v-for="lottery_item in lottery_list">
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
                demo_lottery_list: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                isLogged: false,
                hasPhone: false,
                canStart: false,
                promocode: null,
                code_id: null,
                phone: null,
                lottery_list: [],
                isWin: false
            };
        },
        methods: {
            telegramCallback(user) {
                // gets user as an input
                // id, first_name, last_name, username,
                // photo_url, auth_date and hash
                console.log(user)

                this.user = user;

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
            getCardsList() {
                axios
                    .get('api/users/promo/list')
                    .then(response => {
                        this.lottery_list = response.data.card_list

                        if (this.lottery_list.length > 0)
                            this.canStart = true;
                    });
            },
            sendMessage(message) {
                console.log(message);
                this.$notify({
                    group: 'info',
                    type: 'error',
                    title: 'Оповещение ISUSHI',
                    text: message
                });
            },
            checkValidPromo() {
                if (this.promocode.length == 0) {
                    this.sendMessage("Введите промокод!")
                    return;
                }

                if (!this.hasPhone && this.phone.length == 0) {
                    this.sendMessage("Введите номер телефона!")
                    return;
                }

                axios
                    .post('api/users/promo/validate', {
                        phone: this.phone,
                        promocode: this.promocode,
                        chat_id: this.user.id
                    })
                    .then(response => {
                        console.log(response)
                        if (response.data.status == "success") {
                            this.lottery_list = [];
                            this.code_id = response.data.code_id;
                            this.sendMessage("Ваш код успешно активирован")
                            this.shuffle();

                        }
                    });
            },
            shuffle: function () {
                console.log("start shuffle")
                this.demo_lottery_list = _.shuffle(this.demo_lottery_list)
                console.log("end shuffle")
            },
            openCard() {

                if (!this.isLogged) {
                    this.sendMessage("Сперва авторизируйтесь и введите промокод!")
                    return
                }

                if (this.isWin) {
                    this.sendMessage("Вы уже поучаствовали!")
                    return
                }

                if (this.code_id == null) {
                    this.sendMessage("Промокод не найден!");
                    return;
                }

                axios
                    .post(`api/users/promo/check`, {
                        code_id: this.code_id,
                        chat_id: this.user.id
                    })
                    .then(response => {
                        ///this.lottery_list = response.data
                        console.log(response.data.win);
                        this.sendMessage("Ура! Победили!");
                        this.isWin = true;
                    });
            },


        },
        components: {vueTelegramLogin},
    }
</script>

<style lang="scss">
    .flip-list-move {
        transition: transform 1s;
    }

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

    .btn-lottery {
        background: #dc3545;
        width: 100%;
        height: 47px;
        text-transform: uppercase;
        font-weight: 800;
        border: none;
    }
</style>
