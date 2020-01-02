<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        /*   РОЛЛЫ  */
       \App\Product::create([
            'title'=>'Греческий ролл',
            'description'=>'Маслины, Укроп, Фета сыр, Огурец, Помидор, Перец',
            'category'=>"Роллы",
            'mass'=>"210",
            'price'=>"200",
            'portion_count'=>"8",
            'image_url'=>'https://sun9-49.userapi.com/c855024/v855024047/196e24/QEtHuDsVM_I.jpg',
            'site_url'=>'',
            'is_active'=>true
        ]);

        \App\Product::create([
            'title'=>'Калифорния Гранд',
            'description'=>'Икра Тобико,Плавленный сыр, Лосось, Креветка тигровая, Огурец',
            'category'=>"Роллы",
            'mass'=>"210",
            'price'=>"300",
            'portion_count'=>"8",
            'image_url'=>'https://sun9-26.userapi.com/c857632/v857632418/11b9b3/QDV4GFbaeQM.jpg',
            'site_url'=>'',
            'is_active'=>true
        ]);

        \App\Product::create([
            'title'=>'Бонито',
            'description'=>'Икра Тобико,Плавленный сыр, Лосось, Креветка тигровая, Огурец',
            'category'=>"Роллы",
            'mass'=>"210",
            'price'=>"300",
            'portion_count'=>"8",
            'image_url'=>'https://sun9-47.userapi.com/c205324/v205324418/31d3/15OYZYapz-o.jpg',
            'site_url'=>'',
            'is_active'=>true
        ]);


        /*   СЭТЫ  */
        \App\Product::create([
            'title'=>'Сет Такара',
            'description'=>'Калифорния Hot, Темпура с лососем, Калифорния Гранд, Маки люкс',
            'category'=>"Сеты",
            'mass'=>"750",
            'price'=>"850",
            'portion_count'=>"30",
            'image_url'=>'https://sun9-62.userapi.com/c855324/v855324047/194364/7V_19VbaDMg.jpg',
            'site_url'=>'',
            'is_active'=>true
        ]);

        /*   Горячие блюда и закуски  */

        \App\Product::create([
            'title'=>'Шампиньоны',
            'description'=>'На выбор:острые/не острые',
            'category'=>"Горячие блюда и закуски",
            'mass'=>"100",
            'price'=>"100",
            'portion_count'=>"8",
            'image_url'=>'https://sun9-12.userapi.com/c854128/v854128487/1975b7/aE7xanmze1s.jpg',
            'site_url'=>'',
            'is_active'=>true
        ]);

        /*   Нигири (Суши)  */

        \App\Product::create([
            'title'=>'Нигири с Лососем',
            'description'=>'Нигири с Лососем',
            'category'=>"Нигири (Суши)",
            'mass'=>"30",
            'price'=>"40",
            'portion_count'=>"1",
            'image_url'=>'https://sun9-7.userapi.com/c824601/v824601383/a3730/mUDt5iyRCFg.jpg',
            'site_url'=>'http://rollx-don.ru/product/нигири/',
            'is_active'=>true
        ]);
    }
}
