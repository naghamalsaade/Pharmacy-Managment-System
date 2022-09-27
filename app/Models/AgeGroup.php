<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgeGroup extends Model
{
    use SoftDeletes;
    
    protected $table = 'age_groups';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name_age_group'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    
    public function medicines()
    {
    	return $this -> hasMany('App\Models\Medicine', 'age_group_id', 'id');
    }
}
