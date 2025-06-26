<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameSpec extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'game_id', 'type', 'cpu', 'ram', 'video_card', 'vram',
        'os', 'directx', 'pixel_shader', 'vertex_shader',
        'network', 'disk_space', 'note'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
