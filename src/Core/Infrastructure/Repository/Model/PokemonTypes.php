<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Model;

use Illuminate\Database\Eloquent\Model;

class PokemonTypes extends Model
{
    protected $table = 'pokemon_types';

    protected $fillable = ['pokemon_id', 'type_id'];
}
