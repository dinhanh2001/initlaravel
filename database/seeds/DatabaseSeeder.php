<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FoodCategorySeeder::class);
        $this->call(FoodSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(DiseasesSeed::class);
        $this->call(UserSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);
        $this->call(RecipesSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
