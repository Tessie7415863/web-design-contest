<?php

namespace Database\Seeders;

use App\Models\ViTriSach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViTriSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ViTriSach::factory()->count(3)->create();
    }
}