<?php

namespace Database\Seeders;

use App\Constant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('route_permission')->truncate();
        DB::table('route_permission')->insert(
            [
                'id' => 1,
                'name' => 'admin-backend/index',
                'role' => Constant::ADMIN_ROLE
            ]
        );
        DB::table('route_permission')->insert(
            [
                'id' => 2,
                'name' => 'admin-backend/index',
                'role' => Constant::EDITOR_ROLE
            ]
        );
        DB::table('route_permission')->insert(
            [
                'id' => 3,
                'name' => 'admin-backend/city',
                'role' => Constant::ADMIN_ROLE
            ]
        );
        DB::table('route_permission')->insert(
            [
                'id' => 4,
                'name' => 'admin-backend/hobby',
                'role' => Constant::ADMIN_ROLE
            ]
        );
        DB::table('route_permission')->insert(
            [
                'id' => 5,
                'name' => 'admin-backend/user',
                'role' => Constant::ADMIN_ROLE
            ]
        );
        DB::table('route_permission')->insert(
            [
                'id' => 6,
                'name' => 'admin-backend/setting',
                'role' => Constant::ADMIN_ROLE
            ]
        );
    }
}
