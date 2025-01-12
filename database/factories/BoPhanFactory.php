<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoPhan>
 */
class BoPhanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $faker = \Faker\Factory::create('vi_VN');

        return [
            'ten_bo_phan' => $faker->company(),
            'mo_ta' => $faker->text(10),
        ];
    }
}
