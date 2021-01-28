<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->getCharacter() as $character) {
            Quote::factory(rand(3,7))->create([
                'episode_id' => $character->episodes()->inRandomOrder()->first()->id,
                'character_id' => $character->id
            ]);
        }
    }

    public function getCharacter(): ?\Generator
    {
        foreach (Character::has('episodes')->get()  as $character) {
            yield $character;
        }
    }
}
