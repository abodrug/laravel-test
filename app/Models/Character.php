<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Character
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $birthday
 * @property array $occupations
 * @property string $img
 * @property string $nickname
 * @property string $portrayed
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Episode[] $episodes
 * @property-read int|null $episodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Quote[] $quotes
 * @property-read int|null $quotes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Character newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character query()
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereOccupations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character wherePortrayed($value)
 * @mixin \Eloquent
 */
class Character extends Model
{
    use HasFactory, CrudTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'birthday',
        'occupations',
        'img',
        'nickname',
        'portrayed'
    ];

    protected $dates = ['birthday'];

    protected $attributes = [
        'occupations' => '{}',
    ];

    protected $casts = [
        'occupations' => 'array',
        'birthday' => 'date'
    ];

    public function quotes(): hasMany
    {
        return $this->hasMany(Quote::class);
    }

    public function episodes(): BelongsToMany
    {
        return $this->belongsToMany(Episode::class);
    }

}
