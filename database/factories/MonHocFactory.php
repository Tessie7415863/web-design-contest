<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=MonHoc>
 */
class MonHocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_mon' => $this->faker->randomElement(['Toán Học', 'Vật Lý', 'Hóa Học', 'Sinh Học', 'Lịch Sử']),
            'nganh_id' => \App\Models\Nganh::inRandomOrder()->first()->id ?? null,
        ];
    }

}