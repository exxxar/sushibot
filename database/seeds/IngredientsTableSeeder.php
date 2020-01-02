<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $ingredients = ["Лосось", "Угорь", "Тунец", "Креветка ХОТ(жаренная)",
            "Креветки", "Мидии", "Снежный краб", "Лосось жаренный", "Курица (жаренная)",
            "Окунь", "Икра тобико", "Сливочный сыр", "Сыр тостерный", "Спайси соус (острый)",
            "Майонез", "Томаго (омлет)", "Огурец", "Чука", "Помидор", "Сладкий перец",
            "Лист салата", "Лук зеленый", "Дайкон (редька маринованная)"];

        foreach ($ingredients as $ingredient)
            \App\Ingredient::create([
                'title' => $ingredient,
                'mass' => "30",
                'quantity' => "1",
                'price' => "30",
                'use_type' => 0,
            ]);


    }
}
