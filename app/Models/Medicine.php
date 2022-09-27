<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use SoftDeletes;

    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $table = 'medicines';

    // The attributes that are mass assignable.
    protected $fillable = [
        'generic_name', 'medicine_name', 'alternative_medicine', 'caliber', 'composition', 'indications', 'product_id', 'type_id', 'age_group_id', 'category_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function getPrivacyAttribute($val)
    {
        return $val == 1 ? 'Required' : 'Not Required';
    }


    ##############################Relationships##############################
    
    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function ageGroup()
    {
        return $this->belongsTo('App\Models\AgeGroup', 'age_group_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function effectiveMaterials()
    {
        return $this->belongsToMany('App\Models\EffectiveMaterial', 'medicine_effective_materials','medicine_id', 'effective_material_id', 'id', 'id');
    }

    public function productPlace()
    {
        return $this->belongsTo('App\Models\ProductPlace', 'product_place_id', 'id');
    }
}
