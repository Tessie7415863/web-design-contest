<?php

namespace Database\Seeders;

use App\Models\DigitalResourceMajor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DigitalResourceMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DigitalResourceMajor::factory()->count(3)->create();
    }
}