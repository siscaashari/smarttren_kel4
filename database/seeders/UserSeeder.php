<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bikin 1 Master Admin
        User::create([
            'username' => 'admin_super',
            'password' => bcrypt('rahasia123'),
            'nama' => 'Master Admin SmartTren',
            'email' => 'admin@smarttren.com',
            'role' => 'admin',
            'status' => true,
        ]);

        // Bikin 50 User acak
        User::factory(50)->create();
    }
}