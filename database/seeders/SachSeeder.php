<?php

namespace Database\Seeders;

use App\Models\Sach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sach::factory()->count(30)->create();
    }
}