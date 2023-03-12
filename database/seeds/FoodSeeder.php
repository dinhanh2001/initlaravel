<?php

use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tblfoods')->insert([
            'food_name' => 'Thịt bò',
            'food_energy' => 15,
            'food_protein' => 2,
            'food_lipid' => 2,
            'food_glucid' => 2,
            'food_price' => 2000,
            'food_status' => 1,
            'food_food_category_id' => 1,
        ]);
    }
}
