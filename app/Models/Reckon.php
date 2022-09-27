<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reckon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'paid', 'customer_id', 'b', 'branch_id'
    ];


    ##############################Relationships##############################
    
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id','id');
    }
}
