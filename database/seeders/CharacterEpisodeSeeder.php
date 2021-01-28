<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\CharacterEpisode;
use App\Models\Episode;
use Illuminate\Database\Seeder;

class CharacterEpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getEpisode() as $episode) {
            for ($i = 0; $i < rand(5, 15); $i++) {
                CharacterEpisode::create([
                   'episode_id' => $episode->id,
                   'character_id' => Character::inRandomOrder()->first()->id
                ]);
            }
        }
    }

    public function getEpisode(): ?\Generator
    {
        foreach (Episode::all()  as $episode) {
            yield $episode;
        }
    }
}
