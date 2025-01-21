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
        $yearSuffix = now()->year % 100; // Lấy 2 số cuối của năm hiện tại
        $randomNumber = $faker->randomDigitNotNull(); // Lấy số ngẫu nhiên từ 1 đến 9
        return [
            'user_id' => User::factory(),
            'ho_ten' => $faker->name(),
            'ngay_sinh' => $faker->date('Y-m-d'),
            'gioi_tinh' => $faker->randomElement(['Nam', 'Nữ']),
            'lop' => 'CT' . $yearSuffix . 'CT' . $randomNumber,
            'email' => $faker->unique()->safeEmail(),
            'tai_khoan' => $faker->numerify('#########'),
            'password' => bcrypt('123456'),  // password('123456') for default password '123456'
            'sdt' => $faker->phoneNumber(),
            'dia_chi' => $faker->address(),
        ];
    }

}