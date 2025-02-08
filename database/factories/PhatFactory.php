<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Phat>
 */
class PhatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phieu_tra_id' => \App\Models\PhieuTra::inRandomOrder()->first()->id,
            'sinh_vien_id' => \App\Models\SinhVien::inRandomOrder()->first()->id,
            'sach_id' => \App\Models\Sach::inRandomOrder()->first()->id,
            'so_tien' => $this->faker->randomFloat(2, 5000, 100000),
            'ly_do' => $this->faker->sentence(),
            'tinh_trang' => $this->faker->randomElement(['ChuaThanhToan', 'DaThanhToan']),
        ];
    }

}