<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'photo', 'description', 'price'];

    public function specs()
    {
        return $this->hasMany(GameSpec::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($game) {
            // Delete related specs
            $game->specs()->delete();
        });
    }
}
