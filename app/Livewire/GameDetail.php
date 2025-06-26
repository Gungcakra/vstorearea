<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class GameDetail extends Component
{

    public $gameId;
    public function mount($id)
    {
       if($id) {
           $this->gameId = $id;
       } else {
           abort(404, 'Game not found');
       }
    }
    public function render()
    {
        return view('livewire.pages.user.detail.index',[
            'game' => Game::find($this->gameId)
        ]);
    }
}
