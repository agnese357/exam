<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Pieturas;

class PieturuController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'pietura' => 'required',
            'brauciens' => 'required',
        ]);
        $pietura = New Pieturas;
        $pietura->pilseta = $request->input('pietura');
        $pietura->braucieni_id = $request->input('brauciens');
        $pietura->created_at = Carbon::now()->toDateTimeString();
        $pietura->updated_at = Carbon::now()->toDateTimeString();
        $pietura->save();
        return redirect()->back()->with('success', 'Piertura pievienota!');
    }

    public function destroy($id)
    {
        $pietura = Pieturas::find($id);
        $pietura->delete();

        return redirect()->back()->with('success', 'Piertura dzēsta!');
    }
}
