<?php

use Illuminate\Database\Seeder;

class PrizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for($i=0;$i<40;$i++){
            \App\Prize::create([
                'title'=>"Test prize $i",
                'description'=>"Test description $i",
                'image_url'=>"https://sun9-55.userapi.com/c847120/v847120498/220c5/5h3957r36lA.jpg",
                'position'=>$i,
                'as_default'=>false,
            ]);
        }
    }
}
