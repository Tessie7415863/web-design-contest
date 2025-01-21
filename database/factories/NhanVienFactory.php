<?php

namespace Database\Factories;

use App\Models\BoPhan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NhanVien>
 */
class NhanVienFactory extends Factory
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
            'user_id' => User::factory(), // Tạo user hoặc để trống
            'ho_ten' => $faker->name(),
            'chuc_vu' => $faker->randomElement(['Thủ thư', 'Giáo viên']),
            'email' => $faker->unique()->safeEmail(),
            'sdt' => $faker->numerify('##########'), // Số điện thoại giả lập (10 số)
            'dia_chi' => $faker->address(),
            'bo_phan_id' => BoPhan::factory(), // Liên kết với bảng bộ phận hoặc để null
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}