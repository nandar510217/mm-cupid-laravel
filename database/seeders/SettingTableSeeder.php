<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->truncate();
        DB::table('setting')->insert(
            [
                'id' => 1,
                'point' => 1000,
                'company_name' => 'Myanmar Cupid',
                'company_logo' => '20240510102132_663dd90ccac78.jpg',
                'company_email' => 'mmcupid@gmail.com',
                'company_phone' => '09963163029',
                'company_address' => 'No. 123, Arthit street, Monywa',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
    }
}
