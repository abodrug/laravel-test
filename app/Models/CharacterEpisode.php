<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharacterEpisode
 *
 * @property int $character_id
 * @property int $episode_id
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterEpisode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterEpisode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterEpisode query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterEpisode whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterEpisode whereEpisodeId($value)
 * @mixin \Eloquent
 */
class CharacterEpisode extends Model
{
    use HasFactory, CrudTrait;

    public $timestamps = false;

    public $table = 'character_episode';

    protected $fillable = [
        'episode_id',
        'character_id'
    ];
}
