<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name'
    ];


    public function getTypeAttribute($val)
    {
        return $val == 1 ? 'pharmacy' : 'inventory';
    }

    public function getActiveAttribute($val)
    {
        return $val == 1 ? 'active' : 'not active';
    }

    ##############################Relationships##############################

    public function users()
    {
        return $this->hasMany('App\User','branch_id','id');
    }

    public function location()
    {
    	return $this->belongsTo('App\Models\Location','location_id');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function return_invoices()
    {
        return $this->hasMany('App\Models\ReturnInvoice');
    }

    public function reckons()
    {
        return $this->hasManyThrough('App\Models\Reckon', 'App\User');
    }

    public function booksIn()
    {
        return $this->hasMany('App\Models\BooIn', 'pharmacy_id', 'id');
    }

    public function buyBillProducts()
    {
        return $this -> belongsToMany('App\Models\BuyBillProduct', 'books_in', 'pharmacy_id','buy_bill_product_id', 'id', 'id');
    }
}
