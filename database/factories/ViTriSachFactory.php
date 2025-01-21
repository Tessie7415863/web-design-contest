<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=ViTriSach>
 */
class ViTriSachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'khu_vuc' => $this->faker->randomElement(['Khu A', 'Khu B', 'Khu C']),
            'tuong' => $this->faker->randomElement(['Tường 1', 'Tường 2', 'Tường 3']),
            'ke' => $this->faker->randomElement(['Kệ 1', 'Kệ 2', 'Kệ 3']),
        ];
    }

}