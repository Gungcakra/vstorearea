<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['game_id', 'buyer_name', 'buyer_email', 'price', 'payment_status'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
