<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function tasks(){
   return $this->hasMany("App\user");

    }
}
