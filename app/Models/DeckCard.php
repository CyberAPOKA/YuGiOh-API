<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeckCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'deck_id',
        'card_id'
    ];

    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
