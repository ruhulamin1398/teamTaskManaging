<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLevel extends Model
{
    public  function tasks(){
        return $this->hasMany('App\task');
    }
}
