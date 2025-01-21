<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=DatSach>
 */
class DatSachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sinh_vien_id' => \App\Models\SinhVien::inRandomOrder()->first()->id,
            'cuon_sach_id' => \App\Models\CuonSach::inRandomOrder()->first()->id,
            'ngay_dat' => $this->faker->date(),
            'tinh_trang' => $this->faker->randomElement(['DangDat', 'DaNhan', 'Huy']),
        ];
    }
}