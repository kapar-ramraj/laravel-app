<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'isbn',
        'author_id',
        'publisher_id',
        'category_id',
        'publication_year',
        'quantity',
        'description',
        'cover_image'
    ];
}
