<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Khoa>
 */
class KhoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('vi_VN');
        return [
            'ten_khoa' => $faker->company(),
            'dia_chi' => $faker->address(),
            'sdt' => $faker->phoneNumber(),
            'email' => $faker->unique->safeEmail(),
        ];
    }
}
