<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupen_Code extends Model
{
    protected $table='coupencodes';
    protected $fillable=[
        'code',
        'validfrom',
        'validupto',
        'discount',
                   
        


    ];
}
