<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Artist;
use Faker\Factory as Faker;

class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => $faker->unique()->userName,
                'password' => Hash::make('123456'),
                'email' => $faker->unique()->safeEmail,
                'type' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => $faker->unique()->userName,
                'password' => Hash::make('123456'),
                'email' => $faker->unique()->safeEmail,
                'type' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $users = User::where('type', 2)->get();

        foreach ($users as $user) {
            Artist::create([
                'user_id' => $user->id,
                'status' => 'approved'
            ]);
        }
    }
}