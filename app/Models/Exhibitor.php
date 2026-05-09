<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    protected $fillable = [
        'name', 'slug', 'logo', 'description',
        'website', 'phone', 'email', 'stand_number'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}