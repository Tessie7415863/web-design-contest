<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=TaiLieuMo>
 */
class TaiLieuMoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_tai_lieu' => $this->faker->sentence(4),
            'tac_gia_id' => \App\Models\TacGia::inRandomOrder()->first()->id ?? null,
            'nha_xuat_ban_id' => \App\Models\NhaXuatBan::inRandomOrder()->first()->id ?? null,
            'nam_phat_hanh' => $this->faker->year(),
            'so_trang' => $this->faker->numberBetween(10, 500),
            'isbn' => $this->faker->unique()->isbn13(),
            'link_tai_ve' => $this->faker->url(),
            'khoa_id' => \App\Models\Khoa::inRandomOrder()->first()->id ?? null,
            'mon_hoc_id' => \App\Models\MonHoc::inRandomOrder()->first()->id ?? null,
            'nganh_id' => \App\Models\Nganh::inRandomOrder()->first()->id ?? null,
        ];
    }
}
