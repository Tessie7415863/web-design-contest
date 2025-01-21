<?php

namespace Database\Seeders;

use App\Models\TheLoai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TheLoai::factory()->count(20)->create();
    }
}