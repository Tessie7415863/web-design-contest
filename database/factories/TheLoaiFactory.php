<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=TheLoai>
 */
class TheLoaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $theLoais = [
            'Khoa Học',
            'Văn Học',
            'Lịch Sử',
            'Toán Học',
            'Công Nghệ Thông Tin',
            'Kỹ Năng Sống',
            'Tâm Lý Học',
            'Y Học',
            'Tiểu Thuyết',
            'Thiếu Nhi',
            'Hội Họa',
            'Âm Nhạc',
            'Kinh Tế',
            'Chính Trị',
            'Tôn Giáo',
            'Khoa Học Viễn Tưởng',
            'Pháp Luật',
            'Nông Nghiệp',
            'Du Lịch',
            'Thể Thao'
        ];

        return [
            'ten_the_loai' => $this->faker->unique()->randomElement($theLoais),
            'mo_ta' => $this->faker->optional()->text(200),
        ];
    }
}