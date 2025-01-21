<?php

namespace Database\Seeders;

use App\Models\PhieuMuon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhieuMuonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhieuMuon::factory()->count(10)->create();
    }
}