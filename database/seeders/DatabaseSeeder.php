<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Users;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(GerejaSeeder::class);
        $this->call(UserSeeder::class);

        // Users::factory()->create([
        // ]);
    }
}
