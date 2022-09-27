<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookIn extends Model
{
    use SoftDeletes;

    use \Znck\Eloquent\Traits\BelongsToThrough;

     protected $table = 'books_in';

    // The attributes that are mass assignable.
    protected $fillable = [
        'date', 'quantity', 'amount', 'active', 'product_place_id', 'branch_id', 'buy_bill_product_id', 'is_amount_notify', 'is_expired_notify',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getActiveAttribute($val)
    {
        return $val == 1 ? 'active' : 'not active';
    }

   ##############################Relationships##############################

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch','branch_id');
    }

    public function productPlace()
    {
        return $this->belongsTo('App\Models\ProductPlace', 'product_place_id', 'id');
    }

    public function buyBillProduct()
    {
    	return $this->belongsTo('App\Models\BuyBillProduct', 'buy_bill_product_id', 'id');
    }

    public function despoiledProduct()
    {
        return $this -> hasOne('App\Models\DespoiledProduct', 'batch_id', 'id');
    }
}
