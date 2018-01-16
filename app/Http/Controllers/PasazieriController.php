<?php

namespace App\Http\Controllers;

use App\Pasazieri;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PasazieriController extends Controller
{
    public function store(Request $request)
    {
        $pasazieris = new Pasazieri;
        $pasazieris->braucieni_id = $request->input('brauciena_id');
        $pasazieris->user_id = auth()->user()->id;
        $pasazieris->created_at = Carbon::now()->toDateTimeString();
        $pasazieris->save();
        return redirect('braucieni/mani')->with('success', 'Pasažieris pievienots!');
    }

    public function destroy($pasaziera_id)
    {
        $pasazieris = Pasazieri::find($pasaziera_id);

        $pasazieris -> delete();
        return redirect('braucieni/mani')->with('success', 'Pasažieris izdzēsts!');
    }
}
