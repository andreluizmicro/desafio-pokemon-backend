<?php

declare(strict_types=1);

namespace Core\Infrastructure\Repository\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable = ['id', 'name'];
}
