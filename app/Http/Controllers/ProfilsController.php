<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Atsauksmes;
use Auth;

class ProfilsController extends Controller
{
    public function index($id)
    {
        return view('user', array('user' => User::findOrFail($id)));
    }

    public function mine()
    {
        $id = Auth::user()->id;
        return view('user', array('user' => User::findOrFail($id)));
    }
}
