<?php

namespace Database\Seeders;

use App\Models\BookSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookSubject::factory()->count(20)->create();
    }
}