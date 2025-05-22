<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publisher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'city',
        'phone',
        'email',
        'address',
        'website'
    ];
}
