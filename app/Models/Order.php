<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=[
        'Customer_Emailid',
        'Delivery_Address',
        'Order_Details',
        'Amount',
        'paymentmode',
        'p_status',
        'p_status_Updated_By',
        'Coupen_Code',
              
              
        


    ];
}
