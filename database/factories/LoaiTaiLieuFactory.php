<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=LoaiTaiLieu>
 */
class LoaiTaiLieuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_loai' => $this->faker->randomElement(['Bản cứng', 'PDF']),
            'mo_ta' => $this->faker->sentence(),
        ];
    }

}