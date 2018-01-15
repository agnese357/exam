<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'vards', 'uzvards', 'apraksts',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function atsauksmes() {
        return $this->hasMany('App\Atsauksmes');
    }

    public function braucieni() {
        return $this->hasMany('App\Braucieni');
    }

    public function pasazieri() {
        return $this->hasMany('App\Pasazieri');
    }

    public function isAdmin() {
        return ($this->role == 2);
    }
}
