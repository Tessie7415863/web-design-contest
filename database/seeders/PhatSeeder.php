<?php

namespace Database\Seeders;

use App\Models\Phat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phat::factory()->count(20)->create();
    }
}