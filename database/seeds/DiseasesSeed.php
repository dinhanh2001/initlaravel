<?php

use Illuminate\Database\Seeder;

class DiseasesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diseasess = ["Bệnh tim","Bệnh dạ dày","Bệnh viêm đại tràng"];
    	foreach ($diseasess as $key => $diseases) {
    		DB::table('tbldiseases')->insert([
	            'disease_name' => $diseases,
	            'disease_status' => 1
	        ]);
    	}
    }
}
