<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Braucieni;
use App\User;
use Auth;

class BraucieniController extends Controller
{
    public function index()
    {
        return view('braucienivisi', array('title' => 'Visi braucieni', 'braucieni' => Braucieni::orderBy('izbrauksana')->get()));
    }

    public function show($id)
    {
        return view('brauciens', array('braucieni' => Braucieni::findOrFail($id)));
    }

    public function mine()
    {
        $id = Auth::user()->id;
        return view('braucienimani', array('user' => User::findOrFail($id)));
    }
}
