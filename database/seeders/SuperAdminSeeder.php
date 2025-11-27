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
            'email' => 'admin@orangecard.com',
            'password' => Hash::make('password'),
            'user_role' => 'super_admin',
            'is_active' => true,
        ]);

        $this->command->info('Super Admin created successfully!');
        $this->command->info('Email: admin@orangecard.com');
        $this->command->info('Password: password');
    }
}
