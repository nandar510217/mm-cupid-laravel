<?php

namespace Database\Factories;

use App\Models\Cities;
use App\Models\Members;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Members>
 */
class MembersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName,
            'password' => bcrypt('password'),
            'email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement([0,1]),
            'phone' => '09' . $this->faker->numerify('#########'),
            'email_confirm_code' => md5($this->faker->unique()->safeEmail),
            'date_of_birth' => $this->faker->dateTimeBetween('-40years', '-18years')->format('Y-m-d'),
            'education' => $this->faker->sentence,
            'city_id' => Cities::inRandomOrder()->first()->id,
            'work' => $this->faker->jobTitle,
            'height_feet' => $this->faker->randomElement([4,5,6]),
            'height_inches' => $this->faker->numberBetween(0, 11),
            'status' => 0,
            'religion' => $this->faker->numberBetween(0, 5),
            'about' => $this->faker->sentence,
            'partner_gender' => $this->faker->randomElement([0, 1]),
            'partner_min_age' => $this->faker->numberBetween(18, 30),
            'partner_max_age' => $this->faker->numberBetween(31, 50),
            'point' => 1000,
            'view_count' => 0,
            'thumb_nail' => Str::random(16),
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
