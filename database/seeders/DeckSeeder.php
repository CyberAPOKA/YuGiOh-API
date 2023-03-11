<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Card;
use App\Models\Deck;
use App\Models\UserCard;
use Faker\Generator as Faker;

class DeckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $user = User::inRandomOrder()->first();

        Deck::create([
            'user_id' => $user->id,
            'name' => 'New Hero Summon',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Deck::create([
            'user_id' => $user->id,
            'name' => 'Heart of Gold',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Deck::create([
            'user_id' => $user->id,
            'name' => 'Ultimate Mecha-Dragon',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
