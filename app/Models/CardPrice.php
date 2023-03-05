<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'cardmarket_price',
        'tcgplayer_price',
        'ebay_price',
        'amazon_price',
        'coolstuffinc_price'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
