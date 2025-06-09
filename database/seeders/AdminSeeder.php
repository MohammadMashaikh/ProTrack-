<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'role' => 'super_admin',
            'first_name' => 'Mohammad',
            'last_name' => 'Mashaikh',
            'full_name' => 'Mohammad Mashaikh',
            'password' => bcrypt('password'),
            'status' => 'Active',
            'phone' => null,
        ]
        );

        $admin->assignRole(roles: 'super_admin');
    }
}
