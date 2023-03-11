<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Card;
use App\Models\UserCard;
use Faker\Generator as Faker;

class UserCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $user = User::inRandomOrder()->first();
        $cards = Card::take(100)->get();

        foreach ($cards as $card) {
            UserCard::create([
                'user_id' => $user->id,
                'card_id' => $card->id,
                'quantity' => $faker->randomDigitNotNull()
            ]);
        }
    }
}
