<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'nationality',
        'birth_date',
        'death_date',
        'biography',
        'photo',
    ];
}
