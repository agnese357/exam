<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{

    // Middleware
    public function __construct() {
        // only Admin have access
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function __invoke() {
        $users = DB::table('users')->get();
        return view('admin', ['users' => $users]);
    }
}
