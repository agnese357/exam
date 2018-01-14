<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Braucieni extends Model
{
    public function vaditajs() {
        return $this->belongsTo('App\User');
    }

    public function pasazieri() {
        return $this->hasMany('App\Pasazieri');
    }

    public function pieturas() {
        return $this->hasMany('App\Pieturas');
    }
}
