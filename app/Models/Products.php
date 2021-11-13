<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';
    protected $fillable=[
        'priority',
        'name',
        'description',
        'rating',
        'price',
        'discount',
        'url',
        'image1',
        'image2',
        'image3',
        'image4',
        'title',
        'keywords',
        'meta_description',
        'status',
        
        


    ];
}
