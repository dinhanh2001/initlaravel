<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionss = ["SuperAdmin","Administrator","Editor"];
    	foreach ($permissionss as $key => $permissions) {
    		DB::table('tblpermissions')->insert([
	            'permission_name' => $permissions,
	            'permission_status' => 1
	        ]);
    	}
    }
}
