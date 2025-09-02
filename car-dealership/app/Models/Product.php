<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'description',
    'price',
    'type',
    'brand',
    'model',
    'year',
    'engine',
    'color',
    'image',
    'body_type',
    'transmission',
    'mileage',
    'fuel_type',
    'horsepower',
    'seats',
    'drive_type',
    'motorcycle_type',
    'displacement',
    'cooling',
    'brakes',
    'suspension',
    'weight'
];

    // Scope для автомобилей
    public function scopeCars($query)
    {
        return $query->where('type', 'car');
    }

    // Scope для мотоциклов
    public function scopeMotorcycles($query)
    {
        return $query->where('type', 'motorcycle');
    }

    public function getImageUrlAttribute()
{
    if ($this->image) {
        return asset('storage/images/' . ($this->type == 'car' ? 'cars/' : 'motorcycles/') . $this->image);
    }
    return asset('storage/images/placeholder/vehicle.jpg');
}
}

