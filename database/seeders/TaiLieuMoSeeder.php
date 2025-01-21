<?php

namespace Database\Seeders;

use App\Models\TaiLieuMo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaiLieuMoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaiLieuMo::factory()->count(20)->create();
    }
}