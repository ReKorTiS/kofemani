<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'producer',
        'image',
        'price',
        'unit',
        'shortDescription',
        'description',
    ];
}
