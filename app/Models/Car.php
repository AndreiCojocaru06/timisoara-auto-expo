<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'category_id', 'exhibitor_id', 'brand', 'model',
        'year', 'price', 'fuel_type', 'transmission',
        'horsepower', 'mileage', 'color', 'description',
        'thumbnail', 'is_featured', 'slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function exhibitor()
    {
        return $this->belongsTo(Exhibitor::class);
    }

    public function images()
    {
        return $this->hasMany(CarImage::class)->orderBy('order');
    }
}