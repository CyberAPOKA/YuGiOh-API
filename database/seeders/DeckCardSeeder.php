<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deck;
use App\Models\Card;
use App\Models\DeckCard;

class DeckCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = Card::inRandomOrder()->get();

        Deck::chunk(100, function ($decks) use ($cards) {
            foreach ($decks as $deck) {
                $deck->card()->attach($cards->random(40));
            }
        });
    }
}
