<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnBuyBillProduct extends Model
{
   use SoftDeletes;

   protected $table = 'return_buy_bill_products';

    // The attributes that are mass assignable.
    protected $fillable = [
        'return_buy_bill_id', 'buy_bill_product_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];


    ##############################Relationships##############################
}
