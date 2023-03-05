<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'image_url',
        'image_url_small',
        'image_url_cropped'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
