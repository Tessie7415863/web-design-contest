<?php

namespace Database\Seeders;

use App\Models\MonHoc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MonHoc::factory()->count(10)->create();
    }
}