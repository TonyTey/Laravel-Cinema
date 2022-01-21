<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use App\Models\Area;
use App\Models\Branch;

class AreaController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //the construct require user login before access the controller function
    }

    
    public function store() {
        $r = request();
        $addArea = Area::create([
            'name' => $r->areaName,
        ]);
        Session::flash('success',"Area insert Successful!");

        Return redirect()->route('viewArea');
    }

    public function delete($id) {
        $branch = DB::table('branches')
                    ->select('branches.areaId')
                    ->get();

        $length = count($branch);

        $check = "No";

        for($x =0; $x < $length; $x++) {
            if($branch[$x]->areaId == $id) {
                $check = "Yes";
                break;
            }else {
                $check = "No";
            }
        }

        if($check == "Yes") {
            Session::flash('danger',"This area still have branch exists! Area delete unsuccessful!");
        }else {
            Session::flash('danger',"Area delete successful!");
            $delete = Area::find($id);
            $delete->delete();
        }
        
        Return redirect()->route('viewArea');
    }

    public function edit($id) {
        $area = Area::all()->where('id', $id);
        $detail = Auth::user();

        Return view('editArea')->with('areas', $area)
        ->with('details', $detail);

    }

    public function update() {
        $r = request();
        $area = Area::find($r->areaId);

        $area->name=$r->areaName;
        $area->save();

        Session::flash('success',"Area update Successful!");
        Return redirect()->route('viewArea');
    }

    public function view() {
        $area=Area::all();
        $area=DB::table('areas')
        ->select('areas.*','areas.id as catid','areas.name as catname')
        ->paginate(5);
        $detail = Auth::user();

        Return view('showArea')->with('areas', $area)
        ->with('details', $detail);
    }

    public function index() {
        $detail = Auth::user();

        Return view('insertArea')->with('details', $detail);
    }

    public function searchArea(){
        $r=request();
        $keywordArea=$r->keywordArea;
        $area=DB::table('areas')
        ->where('areas.name','like','%'.$keywordArea.'%')
        ->paginate(5); 
        $detail = Auth::user();

        Return view('showArea')->with('areas',$area)
                               ->with('details', $detail);
    }  

}
