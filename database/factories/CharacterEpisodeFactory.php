<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\CharacterEpisode;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterEpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterEpisode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'episode_id' => Episode::all()->random()->id,
            'character_id' => Character::all()->random(1)->id,
        ];
    }
}
