<?php

namespace Database\Seeders;

use App\Models\SinhVien;
use Illuminate\Database\Seeder;

class SinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SinhVien::factory()->count(20)->create();
    }
}