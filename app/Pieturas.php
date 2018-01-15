<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieturas extends Model
{
    protected $table = 'pieturas';

    public function braucieni() {
        return $this->belongsTo('App\Braucieni');
    }
}
