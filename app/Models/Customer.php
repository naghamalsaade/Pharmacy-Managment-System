<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','mobile','reckoning', 'num', 'active'
    ];

    public function getActiveAttribute($val)
    {
        return $val == 1 ? 'active' : 'not active';
    }

    ##############################Relationships##############################

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice','customer_id','id');
    }

    public function return_invoices()
    {
        return $this->hasMany('App\Models\ReturnInvoice','customer_id','id');
    }
  
    public function reckons()
    {
        return $this->hasMany('App\Models\Reckon','customer_id','id');
    }


}
