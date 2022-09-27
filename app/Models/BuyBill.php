<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyBill extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $table = 'buy_bills';

    // The attributes that are mass assignable.
    protected $fillable = [
        'buy_order_id', 'recieve_date', 'user_id', 'total_price', 'total_payment',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

    public function buyBillProducts()
    {
        return $this->hasMany('App\Models\BuyBillProduct', 'buy_bill_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function buyOrder()
    {
        return $this->belongsTo('App\Models\BuyOrder','buy_order_id','id');
    }

    public function wareHouse()
    {
        return $this->belongsToThrough('App\Models\Warehouse','App\Models\BuyOrder');
    }

    public function branch()
    {
        return $this->belongsToThrough('App\Models\Branch','App\User');
    }

   /* public function buyBillProducts()
    {
     return $this->hasManyThrough(BuyBillProduct::class, BuyProduct::class, 'product_id', 'buy_product_id', 'id', 'id');
    }*/

    
}
