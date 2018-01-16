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

    public function destroy($brauciena_id)
    {
        $search = Pasazieri::where('user_id', auth()->user()->id);
        foreach ($search as $s)
        {
            if ($s->braucieni_id = $brauciena_id) $s -> delete();
        }



 //       $search2 = $search->with('braucieni_id', $brauciena_id);
  //      $search2 -> delete();
        return redirect('braucieni/mani')->with('success', 'Pasažieris izdzēsts!');
    }
}
