<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoPhan>
 */
class BoPhanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('vi_VN');

        $boPhans = [
            'Phòng Quản Lý Sách',
            'Phòng Thủ Thư',
            'Phòng Quản Lý Độc Giả',
            'Phòng Quản Lý Sự Kiện',
            'Phòng Công Nghệ Thông Tin',
            'Phòng Bảo Trì và Hậu Cần',
            'Phòng Quản Lý Tài Chính'
        ];

        return [
            'ten_bo_phan' => $faker->randomElement($boPhans),
            'mo_ta' => $faker->sentence(6), // Mô tả ngắn gọn cho từng bộ phận
        ];
    }
}