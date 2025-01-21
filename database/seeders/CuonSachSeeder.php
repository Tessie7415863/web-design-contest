<?php

namespace Database\Seeders;

use App\Models\CuonSach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuonSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CuonSach::factory()->count(20)->create();
    }
}