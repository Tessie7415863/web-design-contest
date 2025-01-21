<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=PhieuTra>
 */
class PhieuTraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phieu_muon_id' => \App\Models\PhieuMuon::inRandomOrder()->first()->id,
            'ngay_tra' => $this->faker->date(),
            'tinh_trang' => $this->faker->randomElement(['HoanThanh', 'ChuaHoanThanh']),
        ];
    }

}