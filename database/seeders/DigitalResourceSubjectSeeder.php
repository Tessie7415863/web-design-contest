<?php

namespace Database\Seeders;

use App\Models\DigitalResourceSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DigitalResourceSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DigitalResourceSubject::factory()->count(20)->create();
    }
}