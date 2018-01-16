<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Atsauksmes;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

        if(!empty($user->profila_bilde))
        {
            Storage::delete('public/profila_bildes/'.$user->profila_bilde);
        }

        $user->delete();

        return redirect('/')->with('success', 'Profils izdzēsts!');
    }


    public function edit($id)
    {
        if(auth()->user()->id != $id){
            return redirect('/')->with('error', 'Jums nav tiesību labot šo profilu!');
        }
        return view('profilslabot', array('user' => User::findOrFail($id)));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:250|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'vards' => 'required|string|max:255',
            'uzvards' => 'required|string|max:255',
            'apraksts' => 'nullable|string|max:1000',
            'profila_bilde' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('profila_bilde')){
            //orginalais faila nosaukums
            $fails_nos_orginals = $request->file('profila_bilde')->getClientOriginalName();
            //nomaina faila nosaukumu ar laiku taja, lai nebutu dublikatu
            $fails_nos_saglabajams = pathinfo($fails_nos_orginals, PATHINFO_FILENAME).'_'.time().'.'.$request->file('profila_bilde')->getClientOriginalExtension();
            //faila augsupielāde
            $path = $request->file('profila_bilde')->storeAs('public/profila_bildes', $fails_nos_saglabajams);
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->vards = $request->input('vards');
        $user->uzvards = $request->input('uzvards');
        $user->apraksts = $request->input('apraksts');
        $user->updated_at = Carbon::now()->toDateTimeString();
        if($request->hasFile('profila_bilde'))
        {
            if(!empty($user->profila_bilde))
            {
                Storage::delete('public/profila_bildes/'.$user->profila_bilde);
            }
            $user->profila_bilde = $fails_nos_saglabajams;
        }

        $user->save();

        return redirect('user/mans')->with('success', 'Profila informācija labota!');
    }

    public function updaterole(Request $request)
    {
        $this->validate($request,
            [
                'role' => 'required',
                'email' => 'required|string|email|max:250|exists:users,email',
            ]);
        $user = User::where('email', $request->input('email'))->first();

        $user->role = $request->input('role');
        $user->updated_at = Carbon::now()->toDateTimeString();

        $user->save();

        return redirect('admin')->with('success', 'Lietotāja loma mainīta!');
    }
}
