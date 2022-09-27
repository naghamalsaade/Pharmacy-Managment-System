<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyProduct extends Model
{
    protected $table = 'buy_products';

    // The attributes that are mass assignable.
    protected $fillable = [
        'buy_order_id', 'product_id', 'quantity_order',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

    public function order()
    {
        return $this->belongsTo('App\Models\BuyOrder', 'buy_order_id', 'id');
    }
}
