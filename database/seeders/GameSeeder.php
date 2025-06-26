<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameSpec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'title' => 'Resident Evil 4 Remake',
                'description' => 'Remake of the survival horror classic with modern graphics and gameplay.',
                'price' => 150000,
                'photo' => 're4.jpg',
            ],
            [
                'title' => 'Cyberpunk 2077',
                'description' => 'Open-world RPG set in a dystopian future.',
                'price' => 200000,
                'photo' => 'cyberpunk2077.jpg',
            ],
            [
                'title' => 'Grand Theft Auto V',
                'description' => 'Action-adventure open world game with 3 main characters.',
                'price' => 120000,
                'photo' => 'gta5.jpg',
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => 'Western-themed open world game by Rockstar.',
                'price' => 180000,
                'photo' => 'rdr2.jpg',
            ],
            [
                'title' => 'Elden Ring',
                'description' => 'Souls-like open world RPG from FromSoftware.',
                'price' => 220000,
                'photo' => 'eldenring.jpg',
            ],
            [
                'title' => 'Hogwarts Legacy',
                'description' => 'Magic RPG set in the Harry Potter universe.',
                'price' => 210000,
                'photo' => 'hogwarts.jpg',
            ],
            [
                'title' => 'Marvel\'s Spider-Man Remastered',
                'description' => 'Play as Spider-Man in this high-action open world game.',
                'price' => 230000,
                'photo' => 'spiderman.jpg',
            ],
            [
                'title' => 'God of War',
                'description' => 'Mythology-based action adventure featuring Kratos and Atreus.',
                'price' => 250000,
                'photo' => 'godofwar.jpg',
            ],
            [
                'title' => 'EA SPORTS FC 24',
                'description' => 'Next generation football game from EA Sports.',
                'price' => 160000,
                'photo' => 'fifa24.jpg',
            ],
            [
                'title' => 'Assassin\'s Creed Valhalla',
                'description' => 'Viking-themed open world action RPG.',
                'price' => 170000,
                'photo' => 'acvalhalla.jpg',
            ],
        ];

        foreach ($games as $gameData) {
            // Copy image to public storage
            $sourcePath = storage_path('app/seed_images/' . $gameData['photo']);

            // if (file _exists($sourcePath)) {
                $fileName = Str::slug(pathinfo($gameData['title'], PATHINFO_FILENAME)) . '_' . Str::random(6) . '.jpg';
                $destinationPath = 'game_images/' . $fileName;

                Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));

                // Insert game
                $game = Game::create([
                    'title' => $gameData['title'],
                    'description' => $gameData['description'],
                    'price' => $gameData['price'],
                    'photo' => $destinationPath,
                ]);

                // Insert minimum spec
                GameSpec::create([
                    'game_id' => $game->id,
                    'type' => 'minimum',
                    'cpu' => 'Intel Core i5',
                    'ram' => '8 GB',
                    'video_card' => 'GTX 1050 Ti',
                    'vram' => '4 GB',
                    'os' => 'Windows 10',
                    'directx' => '12',
                    'pixel_shader' => '5.1',
                    'vertex_shader' => '5.1',
                    'network' => 'Broadband Internet',
                    'disk_space' => '50 GB',
                    'note' => 'Playable at 1080p low-med settings.'
                ]);

                // Insert recommended spec
                GameSpec::create([
                    'game_id' => $game->id,
                    'type' => 'recommended',
                    'cpu' => 'Intel Core i7',
                    'ram' => '16 GB',
                    'video_card' => 'GTX 1660 / RTX 2060',
                    'vram' => '6 GB',
                    'os' => 'Windows 10/11',
                    'directx' => '12',
                    'pixel_shader' => '5.1',
                    'vertex_shader' => '5.1',
                    'network' => 'Broadband Internet',
                    'disk_space' => '50 GB',
                    'note' => 'Smooth at 1080p high settings.'
                ]);
            // }
        }
    }
}
