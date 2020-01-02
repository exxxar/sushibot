<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'mass',
        'price',
        'portion_count',
        'image_url',
        'site_url',
        'is_active'
    ];
}
