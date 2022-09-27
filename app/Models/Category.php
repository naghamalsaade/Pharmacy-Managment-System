<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name_category'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

    public function medicines(){
    	return $this -> hasMany('App\Models\Medicine', 'category_id', 'id');
    }
}
