<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "products";

    // The attributes that are mass assignable.
    protected $fillable = [
        'image', 'bar_code', 'product_country', 'manufacturer_company',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

    public function medicalSupply()
    {
        return $this -> hasOne('App\Models\MedicalSupply', 'product_id', 'id');
    }

    public function medicalFood()
    {
        return $this -> hasOne('App\Models\MedicalFood', 'product_id', 'id');
    }

    public function cosmeticProduct()
    {
        return $this -> hasOne('App\Models\CosmeticProduct', 'product_id', 'id');
    }

    public function medicine()
    {
        return $this -> hasOne('App\Models\Medicine', 'product_id', 'id');
    }

    public function buyOrders()
    {
        return $this->belongsToMany('App\Models\BuyOrder', 'BuyProduct','product_id', 'buy_order_id', 'id', 'id');
    }
}
