<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalSupply extends Model
{
    use SoftDeletes;

    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $table = 'medical_supplies';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name', 'use_to', 'product_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    
     public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
    
    public function productPlace()
    {
        return $this->belongsTo('App\Models\ProductPlace', 'product_place_id', 'id');
    }
}
