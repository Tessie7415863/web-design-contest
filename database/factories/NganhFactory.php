<?php

namespace Database\Factories;

use App\Models\Khoa;
use App\Models\Nganh;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nganh>
 */
class NganhFactory extends Factory
{
    protected $model = Nganh::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nganhs = [
            'Công Nghệ Thông Tin',
            'Khoa Học Máy Tính',
            'Kỹ Thuật Phần Mềm',
            'Hệ Thống Thông Tin',
            'An Toàn Thông Tin',
            'Mạng Máy Tính và Truyền Thông',
            'Điện Tử Viễn Thông',
            'Thiết Kế Đồ Họa',
            'Thương Mại Điện Tử',
            'Trí Tuệ Nhân Tạo',
            'Khoa Học Dữ Liệu',
            'Công Nghệ Đa Phương Tiện',
        ];

        return [
            'ten_nganh' => $this->faker->randomElement($nganhs),
            'khoa_id' => Khoa::factory(),
        ];
    }
}