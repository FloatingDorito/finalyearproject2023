<?php

namespace Database\Seeders;
use App\Models\Artist;
use App\Models\User;

use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('type', 2)->first();

        if ($user) {
            Artist::create([
                'user_id' => $user->id,
                'status' => 'approved'
            ]);
        }
    }
}
