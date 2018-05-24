<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Atsauksmes;

class AtsauksmesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'komentars' => 'required|max:255',
                'vertejums' => 'required|numeric|min:1|max:10',
            ]);
        $atsauksme = new Atsauksmes;
        $atsauksme->komentars = $request->input('komentars');
        $atsauksme->vertejums = $request->input('vertejums');
        $atsauksme->created_at = Carbon::now()->toDateTimeString();
        $atsauksme->updated_at = Carbon::now()->toDateTimeString();
        $atsauksme->user_id = $request->input('user_id');
        $atsauksme->save();

        return redirect()->back()->with('success', 'Atsauksme pievienota!');
    }

    public function destroy($id)
    {
        $atsauksme = Atsauksmes::find($id);
        $atsauksme->delete();

        return redirect()->back()->with('success', 'Atsauksme izdzēsta!');
    }
}