<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mediaComment extends Model
{
    public function media() {
        return $this->belongsTo('App\Media');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
