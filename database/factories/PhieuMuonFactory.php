<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=PhieuMuon>
 */
class PhieuMuonFactory extends Factory
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
            'nhan_vien_id' => \App\Models\NhanVien::inRandomOrder()->first()->id,
            'ngay_muon' => $this->faker->date(),
            'ngay_hen_tra' => $this->faker->date(),
            'ngay_tra' => $this->faker->optional()->date(),
            'tinh_trang' => $this->faker->randomElement(['DangMuon', 'DaTra', 'QuaHan']),
        ];
    }

}