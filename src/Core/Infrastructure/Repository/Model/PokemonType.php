<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PokemonType extends Model
{
    protected $table = 'pokemon_types';

    protected $fillable = ['pokemon_id', 'type_id'];

    public function pokemon(): BelongsTo
    {
        return $this->belongsTo(Pokemon::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
