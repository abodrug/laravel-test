<?php

namespace Database\Factories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

class EpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => str_replace('.', '', $this->faker->sentence(3)),
            'air_date' => $this->faker->dateTimeThisDecade->format('Y-m-d')
        ];
    }
}
