<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'Admin',
                'email' => 'admin@example.com',
                'type' => 1,
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'Artist',
                'email' => 'artist@example.com',
                'type' => 2,
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'User',
                'email' => 'user@example.com',
                'type' => 0,
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}