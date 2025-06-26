<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.user')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.user.home.index',[
            'games' => Game::all(),
        ]);
    }
}
