<?php

namespace App\Livewire;

use App\Models\Transaction as ModelsTransaction;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Transaction extends Component
{
    
    public function render()
    {
        return view('livewire.pages.admin.masterdata.transaction.index',[
            'data' => ModelsTransaction::all(), 
        ]);
    }
}
