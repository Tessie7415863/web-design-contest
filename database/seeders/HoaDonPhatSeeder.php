<?php

namespace Database\Seeders;

use App\Models\HoaDonPhat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoaDonPhatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HoaDonPhat::factory()->count(20)->create();
    }
}