<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
     use SoftDeletes;

     protected $table = 'locations';

    // The attributes that are mass assignable.
    protected $fillable = [
        'country', 'city', 'street'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
}
