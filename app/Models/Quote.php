<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Quote
 *
 * @property int $id
 * @property string $quote
 * @property int $character_id
 * @property int $episode_id
 * @property-read \App\Models\Character|null $characters
 * @property-read \App\Models\Episode|null $episodes
 * @method static \Illuminate\Database\Eloquent\Builder|Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereEpisodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereQuote($value)
 * @mixin \Eloquent
 */
class Quote extends Model
{
    use HasFactory, CrudTrait;

    public $timestamps = false;

    protected $fillable = [
        'quote',
        'episode_id',
        'character_id'
    ];

    public function episode(): BelongsTo
    {
        return $this->belongsTo(Episode::class);
    }

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }
}
