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
        $khoas = [
            'Khoa Công Nghệ Thông Tin',
            'Khoa Khoa Học Máy Tính',
            'Khoa Điện Tử - Viễn Thông',
            'Khoa An Toàn Thông Tin',
            'Khoa Đồ Họa và Thiết Kế',
            'Khoa Kỹ Thuật Phần Mềm',
            'Khoa Thương Mại Điện Tử',
            'Khoa Hệ Thống Thông Tin',
        ];
        $faker = \Faker\Factory::create('vi_VN');
        return [
            'ten_khoa' => $faker->unique()->randomElement($khoas),
            'dia_chi' => $faker->address(),
            'sdt' => $faker->numerify('0#########'),
            'email' => $faker->unique->safeEmail(),
        ];
    }
}