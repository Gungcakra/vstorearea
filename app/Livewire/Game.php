<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.admin')]
class Game extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.masterdata.game.index',[
            'games' => Game::all(),
        ]);
    }
}
