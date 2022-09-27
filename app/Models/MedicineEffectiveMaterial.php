<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineEffectiveMaterial extends Model
{
    use SoftDeletes;

    protected $table = 'medicine_effective_materials';

    // The attributes that are mass assignable.
    protected $fillable = [
        'medicine_id', 'effective_material_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

}
