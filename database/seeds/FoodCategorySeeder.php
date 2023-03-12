<?php

use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = ["Chất đạm","Chất béo","Chất sơ"];
    	foreach ($categories as $key => $category) {
    		DB::table('tblfood_categories')->insert([
	            'food_category_name' => $category,
                'food_category_status' => 1
	        ]);
    	}
    }
}
