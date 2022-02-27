<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Brand;
use App\Models\Category;

class Car extends Model
{
    use HasFactory;

    /**
     * @var Mass assignable fields
     */
    protected $fillable = [
        'model',
        'specs',
        'photos',
        'pricing',
        'description',
        'is_available',
        'description_json',
    ];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
