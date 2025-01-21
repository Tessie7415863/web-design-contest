<?php

namespace Database\Seeders;

use App\Models\Khoa;
use Illuminate\Database\Seeder;

class KhoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Khoa::factory()->count(20)->create();
    }
}