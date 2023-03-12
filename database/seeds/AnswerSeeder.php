<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblanswers')->insert([
            'answer_content' => 'Bạn nên nấu những phần thức ăn riêng đảm bảo cung cấp dinh dưỡng cho tất cả mọi người.',
            'answer_status' => 1,
            'answer_user_id' => 1,
            'answer_question_id' => 1
        ]);
    }
}
