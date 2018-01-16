<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Braucieni;
use App\User;
use Auth;
use Carbon\Carbon;


class BraucieniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return view('braucienivisi',
            array('braucieni' => Braucieni::orderBy('izbrauksana_diena', 'asc')->orderBy('izbrauksana_laiks', 'asc')->get()));
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

    public function create()
    {
        return view('braucienijauns');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'starts' => 'required|string',
                'merkis' => 'required|string',
                'cena' => 'required|numeric',
                'izbrauksana_diena' => 'required|date_format:Y-m-d',
                'izbrauksana_laiks' => 'required|date_format:H:i',
                'pasazieru_sk' => 'required|integer',
            ]);

        $brauciens = new Braucieni;
        $brauciens->starts = $request->input('starts');
        $brauciens->merkis = $request->input('merkis');
        $brauciens->cena = $request->input('cena');
        $izbrauksana = date('Y-m-d H:i:s', strtotime('$request->izbrauksana_diena $request->izbrauksana_laiks'));
        $brauciens->izbrauksana_diena = $request->izbrauksana_diena;
        $brauciens->izbrauksana_laiks = $request->izbrauksana_laiks;
        $brauciens->pasazieru_sk = $request->input('pasazieru_sk');
        $brauciens->user_id = auth()->user()->id;
        $brauciens->piezimes = $request->input('piezimes');
        $brauciens->created_at = Carbon::now()->toDateTimeString();
        $brauciens->updated_at = Carbon::now()->toDateTimeString();
//        $brauciens->cover_image = $fileNameToStore;
        $brauciens->save();

        return redirect('braucieni/mani')->with('success', 'Brauciens pievienots!');
    }

    public function edit($id)
    {
        $brauciens = Braucieni::find($id);
        if(auth()->user()->id !==$brauciens->user_id){
            return redirect('/')->with('error', 'Jums nav tiesību labot šo braucienu!');
        }
        return view('braucienilabot', array('braucieni' => Braucieni::findOrFail($id)));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'starts' => 'required|string',
                'merkis' => 'required|string',
                'cena' => 'required|numeric',
                'izbrauksana_diena' => 'required|date_format:Y-m-d',
                'izbrauksana_laiks' => 'required|date_format:H:i',
                'pasazieru_sk' => 'required|integer',
            ]);

        $brauciens = Braucieni::find($id);
        $brauciens->starts = $request->input('starts');
        $brauciens->merkis = $request->input('merkis');
        $brauciens->cena = $request->input('cena');
        $izbrauksana = date('Y-m-d H:i:s', strtotime('$request->izbrauksana_diena $request->izbrauksana_laiks'));
        $brauciens->izbrauksana_diena = $request->izbrauksana_diena;
        $brauciens->izbrauksana_laiks = $request->izbrauksana_laiks;
        $brauciens->pasazieru_sk = $request->input('pasazieru_sk');
        $brauciens->user_id = auth()->user()->id;
        $brauciens->piezimes = $request->input('piezimes');
        $brauciens->updated_at = Carbon::now()->toDateTimeString();
        $brauciens->save();

        return redirect('braucieni/mani')->with('success', 'Brauciena informācija labota!');
    }

    public function destroy($id)
    {
        $brauciens = Braucieni::find($id);
        $brauciens->delete();

        return redirect('braucieni/mani')->with('success', 'Brauciens izdzēsts!');
    }
}
