<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matchComment extends Model
{
    public function match() {
        return $this->belongsTo('App\Match');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
