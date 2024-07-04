<?php

namespace Database\Seeders;

use App\Models\Members;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(HobbiesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(RoutePermissionTableSeeder::class);
        Members::factory()->count(50)->create();
    }
}
