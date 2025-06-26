<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $fillable = ['game_id', 'email', 'price', 'payment_method'];

    public function game()
    {
        return $this->belongsTo(Game::class)->withTrashed();
    }
}
