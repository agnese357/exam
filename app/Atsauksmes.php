<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atsauksmes extends Model
{
    protected $table = 'atsauksmes';

    public function user() {
        return $this->belongsTo('App\User');
    }
}
