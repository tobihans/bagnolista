<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var Mass assignable fields
     */
    protected $fillable = [
        'model',
        'specs',
        'photos',
        'pricing',
        'brand_id',
        'category_id',
        'description',
        'is_available',
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
