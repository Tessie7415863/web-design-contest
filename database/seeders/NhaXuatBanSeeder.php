<?php

namespace Database\Seeders;

use App\Models\NhaXuatBan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhaXuatBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NhaXuatBan::factory()->count(20)->create();
    }
}