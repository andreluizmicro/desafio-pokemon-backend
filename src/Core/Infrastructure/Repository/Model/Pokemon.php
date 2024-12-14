<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Model;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name', 'height', 'weight'];
}
