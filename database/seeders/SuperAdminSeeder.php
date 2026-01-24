<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'admin@eliteplusnfc.com',
            'password' => Hash::make('Elite@2026!Secure'),
            'user_role' => 'super_admin',
            'is_active' => true,
        ]);
        User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@eliteplusnfc.com',
            'password' => Hash::make('elite123'),
            'user_role' => 'admin',
            'is_active' => true,
        ]);
        User::create([
            'name' => 'Super Admin',
            'username' => 'admin001',
            'email' => 'admin@eliteplusnfc.com',
            'password' => Hash::make('elite123'),
            'user_role' => 'admin',
            'is_active' => true,
        ]);

        $this->command->info('Super Admin created successfully!');
        $this->command->info('Email: admin@eliteplusnfc.com');
        $this->command->info('Password: 123456');
    }
}
