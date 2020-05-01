<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    public function status()
    {
        return $this->belongsTo('App\TaskStatus','task_status_id','id');
    }
    public function level()
    {
        return $this->belongsTo('App\TaskLevel','task_level_id','id');
    }
}
