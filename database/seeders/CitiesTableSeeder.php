<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();
        DB::table('cities')->insert(
            [
                'id' => 1,
                'name' => 'Monywa',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 2,
                'name' => 'Yangon',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 3,
                'name' => 'Mandalay',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 4,
                'name' => 'Taung Gyi',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 5,
                'name' => 'Pyin Oo Lwin',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 6,
                'name' => 'Ka Law',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 7,
                'name' => 'Bago',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 8,
                'name' => 'Lashio',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 9,
                'name' => 'Sittway',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
        DB::table('cities')->insert(
            [
                'id' => 10,
                'name' => 'Nay Pyi Taw',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1,
            ]
        );
    }
}
