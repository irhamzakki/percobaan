<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus user lama dulu (opsional)
        User::truncate();

        // Buat akun admin
        User::create([
            'name' => 'Admin Puskesmas',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456'), // password
        ]);

        // Buat akun user biasa / test
        User::create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
