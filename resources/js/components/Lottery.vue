<template>
    <div>
        <div class="row justify-content-center mb-5">
            <div class="col-sm-4">
                <vue-telegram-login
                        mode="callback"
                        telegram-login="isushibot"
                        @callback="telegramCallback"/>

                <div class="form_group" v-if="isLogged">
                    <input type="text" placeholder="Введите промокод" name="Number" required="required"
                           class="form_control lottery-field">
                    <i class="fas fa-terminal"></i>
                </div>
            </div>
        </div>
        <ul class="lottery">
            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>


            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>


            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>

            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>


            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>


            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>


            <li class="lottery-item-wrapper  wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
                </div>
            </li>


            <li class="lottery-item-wrapper wow slideInUp">
                <div class="lottery-item">
                    <img src="https://sun9-35.userapi.com/c858036/v858036636/102217/wYzvw31u87k.jpg"
                         alt="">
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
                lottery_list: []
            };
        },
        methods: {
            telegramCallback(user) {
                // gets user as an input
                // id, first_name, last_name, username,
                // photo_url, auth_date and hash
                console.log(user)
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
