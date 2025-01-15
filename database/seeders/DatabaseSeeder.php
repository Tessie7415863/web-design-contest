<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
<<<<<<< HEAD
        // $this->call(BoPhanSeeder::class);
        // $this->call(KhoaSeeder::class);
        // $this->call(NganhSeeder::class);
=======
        $this->call(BoPhanSeeder::class);
        $this->call(UserSeeder::class);
>>>>>>> 9ab452ca5a4c7b89e014956bce86ef40717e8a0e

        $this->call([
            BoPhanSeeder::class,
            KhoaSeeder::class,
            NganhSeeder::class,
            SinhVienSeeder::class,
        ]);
    }
}