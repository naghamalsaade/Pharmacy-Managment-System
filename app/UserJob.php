<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{

    ##############################Relationships##############################
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
