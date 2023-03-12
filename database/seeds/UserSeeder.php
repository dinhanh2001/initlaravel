<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblusers')->insert([
            'user_name' => 'Trần Tiến Lương',
            'user_email' => 'tranluong@gmail.com',
            'user_password' => bcrypt(123456),
            'user_gender' => 1,
            'user_job' => 'Sinh viên',
            'user_date_of_birth' => '11/11/1997',
            'user_status' => 1,
            'user_permission_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblusers')->insert([
            'user_name' => 'Trần Đức Long',
            'user_email' => 'duclong@gmail.com',
            'user_password' => bcrypt(123456),
            'user_gender' => 1,
            'user_job' => 'Sinh viên',
            'user_date_of_birth' => '11/11/1997',
            'user_status' => 1,
            'user_permission_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblusers')->insert([
            'user_name' => 'Ngô Thị Thùy Linh',
            'user_email' => 'thuylinh@gmail.com',
            'user_password' => bcrypt(123456),
            'user_gender' => 0,
            'user_job' => 'Sinh viên',
            'user_date_of_birth' => '11/11/1997',
            'user_status' => 1,
            'user_permission_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
