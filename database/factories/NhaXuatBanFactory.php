<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=NhaXuatBan>
 */
class NhaXuatBanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_nha_xuat_ban' => $this->faker->company(),
            'dia_chi' => $this->faker->address(),
            'sdt' => $this->faker->numerify('0#########'),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }

}