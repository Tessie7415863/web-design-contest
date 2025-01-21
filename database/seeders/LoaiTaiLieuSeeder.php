<?php

namespace Database\Seeders;

use App\Models\LoaiTaiLieu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoaiTaiLieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoaiTaiLieu::factory()->count(2)->create();
    }
}