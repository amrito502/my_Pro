<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            ['id' => 1,'name'=> 'Super Admin','type'=> 'superadmin','mobile'=> '01843232324','email'=>"admin@gmail.com",'password'=>'123','vendor_id'=>1,'image'=>'', 'status'=>1],
        ];

        Admin::insert($adminRecords);
    }
}
