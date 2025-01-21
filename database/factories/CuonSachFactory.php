<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=CuonSach>
 */
class CuonSachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sach_id' => \App\Models\Sach::inRandomOrder()->first()->id ?? null,
            'vi_tri_sach_id' => \App\Models\ViTriSach::inRandomOrder()->first()->id ?? null,
            'tinh_trang' => $this->faker->randomElement(['Con', 'Muon', 'Bao_Tri', 'Mat']),
        ];
    }

}