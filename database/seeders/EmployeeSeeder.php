<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('employees')->insert([
            'namalengkap' => 'Andrian Syah',
            'jeniskelamin' => 'Laki-Laki',
            'notelpon' => '087828743671',
            'email' => 'ndriann@gmail.com',
        ]);
    }
}
