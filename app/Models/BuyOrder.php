<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyOrder extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;

   protected $table = 'buy_orders';

    // The attributes that are mass assignable.
    protected $fillable = [
        'warehouse_id', 'user_id', 'order_date', 
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

    public function buyProducts()
    {
        return $this->hasMany('App\Models\BuyProduct','buy_order_id','id');
    }

    public function buyBills()
    {
        return $this->hasMany('App\Models\BuyBill','buy_order_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function wareHouse()
    {
        return $this->belongsTo('App\Models\WareHouse','warehouse_id','id');
    }

    public function branch()
    {
        return $this->belongsToThrough('App\Models\Branch','App\User');
    }
}
