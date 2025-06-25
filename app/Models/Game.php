<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title', 'description', 'price'];

    public function specs()
    {
        return $this->hasMany(GameSpec::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
