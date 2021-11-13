<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table='transactions';
    protected $fillable=[
        'id',
        'Oder_No',
        'email',
        'amount',
        'status',
        'created_at',
                   
        
        


    ];
}
