<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','salary','working_hours','branch_id','type','mobile','vacations', 'permissions'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActiveAttribute($val)
    {
        return $val == 1 ? 'active' : 'not active';
    }
     ##############################Relationships##############################

     public function branch()
     {
         return $this->belongsTo('App\Models\Branch','branch_id','id');
     }

     public function buyBills()
     {
         return $this->hasMany('App\Models\BuyBill','user_id','id');
     }

     public function buyOrders()
     {
         return $this->hasMany('App\Models\BuyOrder','user_id','id');
     }
}

