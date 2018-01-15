<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasazieri extends Model
{
    protected $table = 'pasazieri';

    public function braucieni() {
        return $this->belongsTo('App\Braucieni');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
