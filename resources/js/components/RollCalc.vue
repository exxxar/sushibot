<template>
    <div class="container">
        <form class="calc row align-items-flex-start">
            <div class="col-lg-6">
                            <div class="form-group">
                    <label for=""> Верхнее покрытие ролла:</label>
                    <select name="" id="">
                        <option value="">Лосось</option>
                        <option value="">Угорь</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text">
                </div>

                <h3>Начинка внутри ролла</h3>

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <label class="container">Лосось
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Сыр тостерный
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Тунец
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Спайси соус (острый)
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Угорь
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Майонез
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Креветка ХОТ (жаренная)
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Томаго (омлет)
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Креветки
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Огурец
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Мидии
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Чука
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Снежный краб
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Помидор
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Лосось Жареный
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Сладкий Перец
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Курица (жареная)
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Лист салата
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="container">Окунь
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Лук зеленый
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="container">Икра тобико
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Дайкон (редька маринованная)
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="container">Сливочный сыр
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>

                        </td>
                    </tr>
                    </tbody>
                </table>


            </div>
            <div class="col-lg-6">
                <h3>Выбери форму ролла</h3>

                <table>
                    <tbody>
                    <tr>
                        <td>
                            <p>Квадратная<br>форма</p>
                            <label>
                                <input type="radio" name="test" value="big">
                                <img src="square.jpg">
                            </label>
                        </td>
                        <td>
                            <p>Круглая<br>форма</p>
                            <label>
                                <input type="radio" name="test" value="big">
                                <img src="circle.jpg">
                            </label>
                        </td>
                        <td>
                            <p>Треугольная<br>форма</p>
                            <label>
                                <input type="radio" name="test" value="big">
                                <img src="triangle.jpg">
                            </label>
                        </td>
                    </tr>

                    </tbody>
                </table>

                <h3>Цена ролла</h3>
                <h2>190 ₽</h2>

                <div class="counter">
                    <button>+</button>
                    <input type="number" value="1" min="1">
                    <button>-</button>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">В корзину</button>
                </div>
                            </div>
        </form>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                info: ''
            };
        },
        methods: {
            add: function () {
                axios
                    .get('api/test')
                    .then(response => (this.info = response.data));
            }
        }
    }
</script>
