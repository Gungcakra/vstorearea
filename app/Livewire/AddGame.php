<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class AddGame extends Component
{
    use WithFileUploads;
    // Game attributes
    public $id_game, $title = '', $description = '', $price = '', $photo,$editPhoto;

    // Game spec attributes (minimum)
    public $min_type = 'minimum', $min_cpu = '', $min_ram = '', $min_video_card = '', $min_vram = '', $min_os = '', $min_directx = '', $min_pixel_shader = '', $min_vertex_shader = '', $min_network = '', $min_disk_space = '', $min_note = '';

    // Game spec attributes (recommended)
    public $rec_type = 'recommended', $rec_cpu = '', $rec_ram = '', $rec_video_card = '', $rec_vram = '', $rec_os = '', $rec_directx = '', $rec_pixel_shader = '', $rec_vertex_shader = '', $rec_network = '', $rec_disk_space = '', $rec_note = '';


    protected $rules = [
        'photo' => 'image|max:2048',
    ];
    public function mount($id = null)
    {
        if ($id) {
            $game = \App\Models\Game::findOrFail($id);
            $this->id_game = $game->id;
            $this->title = $game->title;
            $this->description = $game->description;
            $this->price = $game->price;
            $this->editPhoto = $game->photo;

            $specs = $game->specs()->get();
            foreach ($specs as $spec) {
                if ($spec->type === 'minimum') {
                    $this->min_type = $spec->type;
                    $this->min_cpu = $spec->cpu;
                    $this->min_ram = $spec->ram;
                    $this->min_video_card = $spec->video_card;
                    $this->min_vram = $spec->vram;
                    $this->min_os = $spec->os;
                    $this->min_directx = $spec->directx;
                    $this->min_pixel_shader = $spec->pixel_shader;
                    $this->min_vertex_shader = $spec->vertex_shader;
                    $this->min_network = $spec->network;
                    $this->min_disk_space = $spec->disk_space;
                    $this->min_note = $spec->note;
                } else {
                    $this->rec_type = $spec->type;
                    $this->rec_cpu = $spec->cpu;
                    $this->rec_ram = $spec->ram;
                    $this->rec_video_card = $spec->video_card;
                    $this->rec_vram = $spec->vram;
                    $this->rec_os = $spec->os;
                    $this->rec_directx = $spec->directx;
                    $this->rec_pixel_shader = $spec->pixel_shader;
                    $this->rec_vertex_shader = $spec->vertex_shader;
                    $this->rec_network = $spec->network;
                    $this->rec_disk_space = $spec->disk_space;
                    $this->rec_note = $spec->note;
                }
            }
        }
    }


    public function updatedPhoto()
    {
        $this->validateOnly('photo');

        $this->dispatch('success', 'Photo updated successfully.');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',

            'min_cpu' => 'required|string|max:255',
            'min_ram' => 'required|string|max:255',
            'min_video_card' => 'required|string|max:255',
            'min_vram' => 'required|string|max:255',
            'min_os' => 'required|string|max:255',
            'min_directx' => 'nullable|string|max:255',
            'min_pixel_shader' => 'nullable|string|max:255',
            'min_vertex_shader' => 'nullable|string|max:255',
            'min_network' => 'nullable|string|max:255',
            'min_disk_space' => 'required|string|max:255',
            'min_note' => 'nullable|string|max:255',

            'rec_cpu' => 'required|string|max:255',
            'rec_ram' => 'required|string|max:255',
            'rec_video_card' => 'required|string|max:255',
            'rec_vram' => 'required|string|max:255',
            'rec_os' => 'required|string|max:255',
            'rec_directx' => 'nullable|string|max:255',
            'rec_pixel_shader' => 'nullable|string|max:255',
            'rec_vertex_shader' => 'nullable|string|max:255',
            'rec_network' => 'nullable|string|max:255',
            'rec_disk_space' => 'required|string|max:255',
            'rec_note' => 'nullable|string|max:255',
        ]);

        try {
            $game = \App\Models\Game::create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'photo' => $this->photo ? $this->photo->store('games', 'public') : null,
            ]);

            $game->specs()->create([
                'type' => $this->min_type,
                'cpu' => $this->min_cpu,
                'ram' => $this->min_ram,
                'video_card' => $this->min_video_card,
                'vram' => $this->min_vram,
                'os' => $this->min_os,
                'directx' => $this->min_directx,
                'pixel_shader' => $this->min_pixel_shader,
                'vertex_shader' => $this->min_vertex_shader,
                'network' => $this->min_network,
                'disk_space' => $this->min_disk_space,
                'note' => $this->min_note,
            ]);

            $game->specs()->create([
                'type' => $this->rec_type,
                'cpu' => $this->rec_cpu,
                'ram' => $this->rec_ram,
                'video_card' => $this->rec_video_card,
                'vram' => $this->rec_vram,
                'os' => $this->rec_os,
                'directx' => $this->rec_directx,
                'pixel_shader' => $this->rec_pixel_shader,
                'vertex_shader' => $this->rec_vertex_shader,
                'network' => $this->rec_network,
                'disk_space' => $this->rec_disk_space,
                'note' => $this->rec_note,
            ]);

            $this->dispatch('success', __('Game added successfully.'));
            $this->reset();
            return redirect()->route('game');
        } catch (\Exception $e) {
            $this->dispatch('error', __('Failed to add game: ') . $e->getMessage());
        }
    }

    public function update()
    {
        try {


            $this->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',

                'min_cpu' => 'required|string|max:255',
                'min_ram' => 'required|string|max:255',
                'min_video_card' => 'required|string|max:255',
                'min_vram' => 'required|string|max:255',
                'min_os' => 'required|string|max:255',
                'min_directx' => 'nullable|string|max:255',
                'min_pixel_shader' => 'nullable|string|max:255',
                'min_vertex_shader' => 'nullable|string|max:255',
                'min_network' => 'nullable|string|max:255',
                'min_disk_space' => 'required|string|max:255',
                'min_note' => 'nullable|string|max:255',

                'rec_cpu' => 'required|string|max:255',
                'rec_ram' => 'required|string|max:255',
                'rec_video_card' => 'required|string|max:255',
                'rec_vram' => 'required|string|max:255',
                'rec_os' => 'required|string|max:255',
                'rec_directx' => 'nullable|string|max:255',
                'rec_pixel_shader' => 'nullable|string|max:255',
                'rec_vertex_shader' => 'nullable|string|max:255',
                'rec_network' => 'nullable|string|max:255',
                'rec_disk_space' => 'required|string|max:255',
                'rec_note' => 'nullable|string|max:255',
            ]);

            $game = \App\Models\Game::findOrFail($this->id_game);
            
            // delete existing photo
            if ($this->photo) {
                if ($this->editPhoto && Storage::disk('public')->exists($this->editPhoto)) {
                    Storage::disk('public')->delete($this->editPhoto);
                }
            }
            // Storage::delete($this->editPhoto);
            $game->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'photo' => $this->photo ? $this->photo->store('games', 'public') : null,
            ]);

            // Update minimum spec
            $minSpec = $game->specs()->where('type', 'minimum')->first();
            if ($minSpec) {
                $minSpec->update([
                    'cpu' => $this->min_cpu,
                    'ram' => $this->min_ram,
                    'video_card' => $this->min_video_card,
                    'vram' => $this->min_vram,
                    'os' => $this->min_os,
                    'directx' => $this->min_directx,
                    'pixel_shader' => $this->min_pixel_shader,
                    'vertex_shader' => $this->min_vertex_shader,
                    'network' => $this->min_network,
                    'disk_space' => $this->min_disk_space,
                    'note' => $this->min_note,
                ]);
            }

            // Update recommended spec
            $recSpec = $game->specs()->where('type', 'recommended')->first();
            if ($recSpec) {
                $recSpec->update([
                    'cpu' => $this->rec_cpu,
                    'ram' => $this->rec_ram,
                    'video_card' => $this->rec_video_card,
                    'vram' => $this->rec_vram,
                    'os' => $this->rec_os,
                    'directx' => $this->rec_directx,
                    'pixel_shader' => $this->rec_pixel_shader,
                    'vertex_shader' => $this->rec_vertex_shader,
                    'network' => $this->rec_network,
                    'disk_space' => $this->rec_disk_space,
                    'note' => $this->rec_note,
                ]);
            }

            $this->dispatch('success', __('Game updated successfully.'));
            $this->reset();
            return redirect()->route('game');
        } catch (\Exception $e) {
            $this->dispatch('error', __('Failed to update game: ') . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.pages.admin.masterdata.game.add');
    }
}
