<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes;

    protected $table = 'warehouses';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name', 'address', 'mobile', 'email', 'active'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getActiveAttribute($val)
    {
        return $val == 1 ? 'active' : 'not active';
    }

    ##############################Relationships##############################

    public function buyOrders()
    {
    	return $this -> hasMany('App\Models\BuyOrder', 'warehouse_id', 'id');
    }
}
