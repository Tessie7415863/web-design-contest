<?php

namespace Database\Seeders;

use App\Models\DatSach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatSach::factory()->count(10)->create();
    }
}