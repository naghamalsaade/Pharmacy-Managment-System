<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPlace extends Model
{
    use SoftDeletes;

   protected $table = 'product_places';

    // The attributes that are mass assignable.
    protected $fillable = [
        'closet', 'rack', 'drawer'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

        ##############################Relationships##############################
		public function bookIn()
	     {
	        return $this -> hasOne('App\Models\BookIn', 'product_place_id', 'id');
	     }
}
