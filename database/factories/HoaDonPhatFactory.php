<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=HoaDonPhat>
 */
class HoaDonPhatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phat_id' => \App\Models\Phat::inRandomOrder()->first()->id ?? null,
            'ngay_lap' => $this->faker->date(),
            'ngay_thanh_toan' => $this->faker->optional()->date(),
            'trang_thai' => $this->faker->randomElement(['ChuaThanhToan', 'DaThanhToan']),
        ];
    }

}