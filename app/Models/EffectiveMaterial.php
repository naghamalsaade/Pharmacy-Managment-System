<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EffectiveMaterial extends Model
{
    use SoftDeletes;

    protected $table = 'effective_materials';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

    public function medicines()
    {
    	return $this -> belongsToMany('App\Models\Medicine', 'medicine_effective_materials', 'effective_material_id','medicine_id', 'id', 'id');
    }
}
