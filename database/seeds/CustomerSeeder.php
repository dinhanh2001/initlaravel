<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblcustomers')->insert([
            'customer_name' => 'Trần Tiến Lương',
            'customer_email' => 'tranluong@gmail.com',
            'customer_password' => bcrypt(123456),
            'customer_gender' => 1,
            'customer_job' => 'Sinh viên',
            'customer_date_of_birth' => '11/11/1997',
            'customer_status' => 1,
            'customer_address' => 'Hà Nội',
            'customer_height' => 165,
            'customer_weight' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
