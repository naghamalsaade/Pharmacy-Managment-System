<?php

namespace App\Traits;

use App\UserJob;

Trait UserJobTrait
{
    public function userJob($title)
    {
       $job=new UserJob;
       $job->user_id=auth()->guard('web')->user()->id;
       $job->title=$title;
       $job->save();
   }
}