<?php

namespace Database\Seeders;

use App\Models\LienKetSachNganh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LienKetSachNganhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LienKetSachNganh::factory(10)->create();
    }
}