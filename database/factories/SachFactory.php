<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Sach>
 */
class SachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_sach' => $this->faker->sentence(3),
            'tac_gia_id' => \App\Models\TacGia::inRandomOrder()->first()->id,
            'nha_xuat_ban_id' => \App\Models\NhaXuatBan::inRandomOrder()->first()->id,
            'the_loai_id' => \App\Models\TheLoai::inRandomOrder()->first()->id,
            'nam_xuat_ban' => $this->faker->year(),
            'so_trang' => $this->faker->numberBetween(50, 1000),
            'isbn' => $this->faker->unique()->isbn13(),
            'mon_hoc_id' => \App\Models\MonHoc::inRandomOrder()->first()->id,
            'nganh_id' => \App\Models\Nganh::inRandomOrder()->first()->id,
            'khoa_id' => \App\Models\Khoa::inRandomOrder()->first()->id,
        ];
    }

}