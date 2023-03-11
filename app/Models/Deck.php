<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Deck extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function card()
    {
        return $this->belongsToMany(Card::class, 'deck_cards', 'deck_id', 'card_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
