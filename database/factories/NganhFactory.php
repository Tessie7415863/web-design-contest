<?php

namespace Database\Factories;

use App\Models\Khoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nganh>
 */
class NganhFactory extends Factory
{
    protected $model = Nganh::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_nganh' => $this->faker->jobTitle(),
            'khoa_id' => Khoa::factory()
        ];
    }
}
