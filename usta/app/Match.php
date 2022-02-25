<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function user(){
        return $this->belongsToMany('App\User')->withPivot('goals','assists','saves','team');
    }

    public function comments() {
        return $this->hasMany('App\matchComment');
    }
}
