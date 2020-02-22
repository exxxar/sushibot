<template>
    <div class="container">

        <div class="calc row align-items-flex-start">
            <div class="col-lg-6 right">
                <div class="form-group">
                    <label for="coating"> Верхнее покрытие ролла:</label>
                    <select name="coating" id="coating" v-model="selectedCoating">
                        <option :value="coat.id" v-for="(coat,index) in coatings">{{coat.title}}</option>
                    </select>
                </div>

                <h3>Начинка внутри ролла</h3>

                <div class="row tr">
                    <div class="col-md-6 col-sm-12 col-lg-6 td" v-for="(fill, index) in fillings">

                        <label class="container">{{fill.title}}
                            <input type="checkbox"
                                   :disabled="checkedFillings.length === 4 && checkedFillings.indexOf(fill.id) === -1"
                                   :value="fill.id" v-model="checkedFillings">
                            <span class="checkmark"></span>
                        </label>

                    </div>

                </div>


            </div>
            <div class="col-lg-6 left">
                <h3>Выбери форму ролла</h3>

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <p>Квадратная<br>форма</p>
                            <label>
                                <input type="radio" name="test" value="Квадратная" v-model="pickedForm">
                                <img src="square.jpg">
                            </label>
                        </td>
                        <td>
                            <p>Круглая<br>форма</p>
                            <label>
                                <input type="radio" name="test" value="Круглая" v-model="pickedForm">
                                <img src="circle.jpg">
                            </label>
                        </td>
                        <td>
                            <p>Треугольная<br>форма</p>
                            <label>
                                <input type="radio" name="test" value="Треугольная" v-model="pickedForm">
                                <img src="triangle.jpg">
                            </label>
                        </td>
                    </tr>

                    </tbody>
                </table>


                <h3 class="text-center">Цена ролла</h3>
                <h2 class="text-center text-white">{{summary_price*summary_count}}₽</h2>
                <p class="text-justify text-white"><em>Цена указана за 1 порцию роллов (вы заказали {{summary_count}}
                    порций). Порция включает в себя 8 штук роллов общей массой {{summary_mass}} грамм.</em></p>


                <div class="row justify-content-center mt-4">
                    <div class="col-sm-2">
                        <button class="btn btn-warning counter-btn" @click="dec">-</button>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" disabled="true" class="form-control counter" v-model="summary_count" min="1">

                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-warning counter-btn" @click="inc">+</button>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-sm-6">
                        <input type="text" class="form-control phone" v-model="phone"
                               placeholder="Введите номер телефона">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control name" v-model="name"
                               placeholder="Введите ваше имя">
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-sm-8">
                        <button class="btn send-btn" :disabled="disabledRule()" @click="sendRequest">
                            Заказать
                        </button>
                    </div>

                </div>

            </div>
        </div>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                summary_price: 100,
                summary_mass: 100,
                summary_count: 1,
                phone: '',
                name: '',
                coatings: [],
                fillings: [],
                checkedFillings: [],
                selectedCoating: null,
                pickedForm: 'Квадратная'
            };
        },
        watch: {
            selectedCoating: function (newVal, oldVal) {
                if (oldVal != null) {
                    let item = this.coatings.find(item => {
                        return item.id == oldVal;
                    });
                    this.summary_price -= parseInt(item.price, 0);
                    this.summary_mass -= parseInt(item.mass, 0);
                }

                let item = this.coatings.find(item => {
                    return item.id == newVal;
                });
                this.summary_price += parseInt(item.price, 0);
                this.summary_mass += parseInt(item.mass, 0);


            },
            checkedFillings: function (newVal, oldVal) {

                if (newVal.length == 4) {
                    this.sendMessage("Можно выбрать не более 4х типов начинки")
                }

                if (newVal.length > oldVal.length) {
                    let item = this.fillings.find(item => {
                        return item.id == newVal[newVal.length - 1];
                    });
                    this.summary_price += parseInt(item.price, 0);
                    this.summary_mass += parseInt(item.mass, 0);
                }
                if (newVal.length < oldVal.length) {
                    let item = this.fillings.find(item => {
                        return item.id == oldVal[oldVal.length - 1];
                    });
                    this.summary_price -= parseInt(item.price, 0);
                    this.summary_mass -= parseInt(item.mass, 0);
                }
            },
        },
        mounted() {
            this.loadCoating();
            this.loadFilling();

        },
        methods: {
            disabledRule() {
                return this.phone.length < 15 ||
                    this.name.length < 2 ||
                    this.selectedCoating == null ||
                    this.pickedForm == null ||
                    this.fillings.length === 0;
            },
            sendRequest() {
                let tmp_coating = this.coatings.find(item => {
                    return item.id === this.selectedCoating;
                });

                let coating = `${tmp_coating.title} [${tmp_coating.mass} грамм] [${tmp_coating.price} ₽]`;

                let filling = "";

                for (let j = 0; j < this.checkedFillings.length; j++) {
                    let tmp = this.fillings.find(item => {
                        return item.id === this.checkedFillings[j];
                    });
                    filling += `${tmp.title} [${tmp.mass} грамм] [${tmp.price} ₽]`;
                }


                let message = `*Заказ на сбор ролла*:\n*Покрытие*:\n${coating}\n*Наполнение*:\n${filling}\n*Форма* ${this.pickedForm}\n*Итого*: ${this.summary_price}₽ за ${this.summary_count} порций`
                axios
                    .post('api/send-request', {
                        name: this.name,
                        phone: this.phone,
                        message: message
                    })
                    .then(response => {
                        this.sendMessage("Заказ успешно отправлен");
                    });
            },
            dec() {
                if (this.summary_count > 1)
                    this.summary_count--;

            },
            inc() {
                this.summary_count++;


            },
            inArray(id) {
                return false;//this.checkedFillings.indexOf(id)>=0;
            },
            loadCoating() {
                axios
                    .get('api/ingredients/1')
                    .then(response => {
                        this.coatings = response.data.ingredients
                        this.selectedCoating = this.coatings[0].id
                    });
            },
            loadFilling() {
                axios
                    .get('api/ingredients/2')
                    .then(response => {
                        this.fillings = response.data.ingredients

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
        }
    }
</script>

<style lang="scss">
    .send-btn {
        width: 100%;
        padding: 15px;
        background: #dc3545;
        text-transform: uppercase;

        &[disabled] {
            background-color: darkgray;
        }
    }

    .counter-btn {
        width: 100%;
    }

    .name,
    .phone {
        padding: 25px;
        font-weight: 100;
        text-align: center;
        font-size: 14px;

    }


</style>
