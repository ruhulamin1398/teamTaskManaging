<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    public  function tasks(){
        return $this->hasMany('App\task');
    }
}
