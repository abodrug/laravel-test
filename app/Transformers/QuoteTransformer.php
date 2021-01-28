<?php

namespace App\Transformers;

use App\Models\Quote;
use Flugg\Responder\Transformers\Transformer;

class QuoteTransformer extends Transformer
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
     * @param  \App\Models\Quote $quote
     * @return array
     */
    public function transform(Quote $quote): array
    {
        return [
            'quote' => $quote->quote,
            'episode_id' => (int) $quote->episode_id,
            'character_id' => (int) $quote->character_id,
        ];
    }
}
