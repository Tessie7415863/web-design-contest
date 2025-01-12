<?php

namespace Database\Seeders;

use App\Models\BoPhan;
use Illuminate\Database\Seeder;

class BoPhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bophan::factory()->count(50)->create();
    }
}
