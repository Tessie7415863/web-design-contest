<?php

namespace Database\Seeders;

use App\Models\Nganh;
use Illuminate\Database\Seeder;

class NganhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nganh::factory()->count(10)->create();
    }
}
