<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id','sub_total','discount_type','discount_value','vat_value','shipping','total_due','paid','total_amount', 'user_id','customer_id','branch_id'
    ];

    ##############################Relationships##############################

    public function discountResult()
    {
        return $this->discount_type == 'fixed' ? $this->discount_value : $this->discount_value.'%';
    }

    public function invoiceProduct()
    {
        return $this->hasMany('App\Models\InvoiceProduct','invoice_id','id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function User()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch','branch_id');
    }
}
