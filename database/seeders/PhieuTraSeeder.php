<?php

namespace Database\Seeders;

use App\Models\PhieuTra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhieuTraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhieuTra::factory()->count(10)->create();
    }
}