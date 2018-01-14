<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasazieri extends Model
{
    public function braucieni() {
        return $this->belongsTo('App\Braucieni');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
