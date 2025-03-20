<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::create([
            'name' => 'admin',
            'usernama' => 'admin1',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'alamat' => 'Jl. Raya No. 1',
            'hp' => '08123456789',
            'status' => 'Manager',
            'user_priv' => 'admin',
        ]);

        User::create([
            'name' => 'petugas',
            'usernama' => 'petugas1',
            'email' => 'petugas@example.com',
            'password' => bcrypt('password'),
            'alamat' => 'Jl. Raya No. 1',
            'hp' => '08123456789',
            'status' => 'chasier1',
            'user_priv' => 'petugas',
        ]);
    }
}
