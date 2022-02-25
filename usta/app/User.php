<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Match;
class User extends Authenticatable
{
    public function match(){
        return $this->belongsToMany('App\Match')->withPivot('goals','assists','saves','team');
    }

    public function comments() {
        return $this->hasMany('App\matchComment');
    }

    public function media() {
        return $this->hasMany('App\Media');
    }

    public function lastMatch() {
        return $this->belongsToMany('App\Match')
            ->withPivot('goals','assists','saves','team')
            ->where('status','=','finished')
            ->orderBy('created_at','desc');
    }

    public function goals() {
        return $this->match()->sum('goals');
    }

    public function statsInMatch($id) {
        return $this->match()->where('match_id','=',$id)->first();

    }

    public function assists() {
        return $this->match()->sum('assists');
    }

    public function saves() {
        return $this->match()->sum('saves');
    }

    public function maxGoals() {
        return $this->match()->max('goals');
    }

    public function maxAssists() {
        return $this->match()->max('assists');
    }

    public function maxSaves() {
        return $this->match()->max('saves');

    }
}