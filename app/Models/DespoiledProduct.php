<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DespoiledProduct extends Model
{
    use SoftDeletes;

    protected $table = 'despoiled_products';

    // The attributes that are mass assignable.
    protected $fillable = [
        'book_in_id', 'despoiled_amount', 'expired_date', 'is_destroyed', 'is_retrieved'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    
    public function bookIn()
    {
        return $this->belongsTo('App\Models\BookIn', 'batch_id', 'id');
    }
}
