<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SinhVien>
 */
class SinhVienFactory extends Factory
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
            'user_id' => User::factory(),
            'ho_ten' => $faker->name(),
            'ngay_sinh' => $faker->date('Y-m-d'),
            'gioi_tinh' => $faker->randomElement(['Nam', 'Nữ']),
            'lop' => $faker->regexify('[A-Z]{1}[0-9]{2}'),
            'email' => $faker->unique()->safeEmail(),
            'sdt' => $faker->phoneNumber(),
            'dia_chi' => $faker->address(),
        ];
    }
}
