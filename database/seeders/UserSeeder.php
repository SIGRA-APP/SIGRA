<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'SuperAdmin',
                'password' => Hash::make('admin'),
                'email' => 'superadmin@example.com',
                'role' => 'super-admin',
                'name' => 'Super Admin',
                'gereja_id' => '1'
            ],
            [
                'username' => 'AdminUser',
                'password' => Hash::make('admin'),
                'email' => 'admin@example.com',
                'role' => 'admin',
                'name' => 'Admin User',
                'gereja_id' => '1'
            ]
        ]);
    }
}
