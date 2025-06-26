<?php

namespace App\Livewire;

use App\Models\Game as ModelsGame;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.admin')]
class Game extends Component
{
    public $search = '', $idToDelete;
    protected $listeners = ['deleteGameConfirmed'];
   
    public function delete($id)
    {
        $this->idToDelete = $id;
        $this->dispatch('confirm-delete', 'Yakin menghapus game ini?');
    }
    public function deleteGameConfirmed()
    {
        $deleteData =  ModelsGame::findOrFail($this->idToDelete);
        if ($deleteData->photo) {
            Storage::disk('public')->delete($deleteData->photo);
        }
        $deleteData->delete();

        $this->dispatch('success', 'Game berhasil dihapus');
        $this->idToDelete = null;

    }
    public function render()
    {
        return view('livewire.pages.admin.masterdata.game.index',[
            'data' => ModelsGame::where('title', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
