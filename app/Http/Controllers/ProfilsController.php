<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Atsauksmes;
use Auth;

class ProfilsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index($id)
    {
        return view('user', array('user' => User::findOrFail($id)));
    }

    public function show()
    {
        $id = Auth::user()->id;
        return view('user', array('user' => User::findOrFail($id)));
    }

    public function destroy($id)
    {

        $user = User::find($id);
        
        $user->delete();

        return redirect('/')->with('success', 'Profils izdzēsts!');
    }

}
