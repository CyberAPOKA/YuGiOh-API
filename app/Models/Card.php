<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'frameType',
        'desc',
        'atk',
        'def',
        'level',
        'race',
        'attribute'
    ];

    public function set()
    {
        return $this->hasMany(CardSet::class);
    }

    public function image()
    {
        return $this->hasMany(CardImage::class);
    }

    public function price()
    {
        return $this->hasMany(CardPrice::class);
    }
}
