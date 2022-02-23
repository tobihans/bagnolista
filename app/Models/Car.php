<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'specs',
        'photos',
        'pricing',
        'description',
        'is_available',
        'description_json',
    ];
}
