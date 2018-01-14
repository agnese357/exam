<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieturas extends Model
{
    public function braucieni() {
        return $this->belongsTo('App\Braucieni');
    }
}
