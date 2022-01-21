<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use App\Models\Movie;


class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); //the construct require user login before access the controller function
    }

    public function index()
    {
        if (Auth::id() == '1') {
            $detail = Auth::user();

            return view('layouts.dashboard')->with('details', $detail);
        }else {
            $movie = Movie::all();

            return view('welcome')->with('movies', $movie);
        }
    }

    public function log_out()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
