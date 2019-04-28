<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function course(){
        return $this->belongsTo('App\Course');
    }
}
