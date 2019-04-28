<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function enrollment(){
        return $this->hasMany('App\Enrollment');
    }
}
