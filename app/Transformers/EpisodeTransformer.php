<?php

namespace App\Transformers;

use App\Models\Episode;
use Flugg\Responder\Transformers\Transformer;

class EpisodeTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Models\Episode $episode
     * @return array
     */
    public function transform(Episode $episode): array
    {
        return [
            'id' => (int) $episode->id,
            'title' => $episode->title,
            'air_date' => $episode->air_date->format('Y-m-d'),
            'characters' => $episode->characters->makeHidden('pivot'),
        ];
    }
}
