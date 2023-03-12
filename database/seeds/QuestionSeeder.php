<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tblquestions')->insert([
            'question_content' => 'Gia đình tôi hiện đang có 5 người, bao gồm cả người già và trẻ nhỏ. Vậy làm sao để tôi có một bữa ăn đảm bảo dinh dưỡng cho tất cả mọi người?',
            'question_status' => 1,
            'question_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
