<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\DateTime;
use App\Models\Movie;
use App\Models\Branch;
use Session;

class DateTimeController extends Controller
{
    public function index() {
        $movie = Movie::all();
        $detail = Auth::user();

        $length = count($movie);
        $check = "Yes";

        for($x = 0; $x< $length; $x++) {
            if(!empty($movie)) {
                $check = "No";
                break;

            }else {
                $check = "Yes";
            }
        }

        if($check == "Yes") {
            Session::flash('danger',"Please insert movie first!");
            Return redirect()->route('viewMovie');

        }else {
            return view('movieBeforeDateTime')->with('movies', $movie)
        ->with('details', $detail);
        }

    }

    public function load() {
        $r = request();
        $movie = Movie::all()->where('id',$r->movie);
        $branch = Branch::all();
        $branchID = Movie::find($r->movie);
        $detail = Auth::user();

        return view('insertDateTime')->with('details', $detail)
        ->with('movies', $movie)
        ->with('branchs', $branch)
        ->with('branchsID', explode(',', $branchID->branchID));

    }

    public function store() {
        $r = request();

        $addDateTime = DateTime::create([
            'movie' => $r->movie,
            'date' => $r->movieDate,
            'time' => implode(',', $r->time),
            'branchID' => implode(',', $r->branchID),

        ]);
        Session::flash('success',"Date & Time added successful!");
        return redirect()->route('viewDateTime');
    }

    public function view() {
        $dateTime = DateTime::all();
        $detail = Auth::user();

        return view('showDateTime')->with('dateTimes', $dateTime)
        ->with('details', $detail);
    }

    public function edit($id) {
        $movie = Movie::all();
        $dateTime = DateTime::all()->where('id', $id);
        $branch = Branch::all();

        $time = DateTime::find($id)->value('time');
        $branchID = DateTime::find($id)->value('branchID');

        $detail = Auth::user();

        return view('editDateTime')->with('movies', $movie)
        ->with('dateTimes', $dateTime)
        ->with('times', explode(',', $time))
        ->with('branchsID', explode(',', $branchID))
        ->with('branchs', $branch)
        ->with('details', $detail);

    }

    public function update() {
        $r = request();

        $updateDateTime = DateTime::find($r->id);

        $updateDateTime->movie = $r->movie;
        $updateDateTime->date = $r->movieDate;
        $updateDateTime->time = implode(',', $r->time);
        $updateDateTime->branchID = implode(',', $r->branchID);
        $updateDateTime->save();

        return redirect()->route('viewDateTime');
    }

    public function delete($id) {
        $delete=DateTime::find($id);
        $delete->delete();
        Session::flash('danger',"Date & Time deleted successful!");
        Return redirect()->route('viewDateTime');
    }

    public function details($id) {
        $dateTime = DateTime::all()->where('id', $id);
        $detail = Auth::user();
        $branch = Branch::all();
        $time = DateTime::find($id)->value('time');
        $branchID = DateTime::find($id)->value('branchID');

        return view('dateTimeDetail')->with('dateTimes', $dateTime)
        ->with('details', $detail)
        ->with('branchs', $branch)
        ->with('times', explode(',', $time))
        ->with('branchsID', explode(',', $branchID));

    }

    public function searchDateTime(){
        $r=request();
        $keywordDateTime=$r->keywordDateTime;
        $dateTime=DB::table('date_times')
        ->where('date_times.movie','like','%'.$keywordDateTime.'%')
        ->get(); 
        $detail = Auth::user();

        Return view('showDateTime')->with('dateTimes',$dateTime)
                                   ->with('details', $detail);
    }
}
