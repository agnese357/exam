<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Braucieni extends Model
{
    protected $table = 'braucieni';

    protected $fillable = [
        'starts', 'merkis', 'cena', 'izbrauksana', 'pasazieru_sk', 'piezimes'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function pasazieri() {
        return $this->hasMany('App\Pasazieri');
    }

    public function pieturas() {
        return $this->hasMany('App\Pieturas');
    }
}
