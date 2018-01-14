<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atsauksmes extends Model
{
    public function autors() {
        return $this->belongsTo('App\User', 'autors_id');
    }

    public function vertetais() {
        return $this->belongsTo('App\User', 'vertetais_id');
    }
}
