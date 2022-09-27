<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    protected $table = 'types';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name_type'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    
    public function medicines()
    {
    	return $this -> hasMany('App\Models\Medicine', 'type_id', 'id');
    }
}
