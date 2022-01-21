<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Branch;
use App\Models\Area;
use Session;

class BranchController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //the construct require user login before access the controller function
    }

    
    public function index() {
        $area = Area::all();
        $detail = Auth::user();

        $length = count($area);
        $check = "Yes";

        for($x = 0; $x< $length; $x++) {
            if(!empty($area)) {
                $check = "No";
                break;

            }else {
                $check = "Yes";
            }
        }

        if($check == "Yes") {
            Session::flash('danger',"Please insert area first!");
            Return redirect()->route('viewArea');

        }else {
            Return view('insertBranch')->with('areas', $area)
            ->with('details', $detail);
        }

    }

    public function store() {
        $r = request();
        $addBranch = Branch::create([
            'name' => $r->branchName,
            'location' => $r->location,
            'numberOfHalls' => $r->numberOfHalls,
            'seatingCapacity' => $r->seatingCapacity,
            'areaId' => $r->areaId,
        ]);

        Session::flash('success',"Branch insert successful!");
        Return redirect()->route('viewBranch');
    }

    public function delete($id) {
        $delete = Branch::find($id);
        $delete->delete();

        Session::flash('danger',"Branch delete successful!");
        Return redirect()->route('viewBranch');
    }

    public function view() {
        $branch = DB::table('branches')
        ->select('branches.*')
        ->orderBy('id')
        ->paginate(5);

        $area = Area::all();

        $detail = Auth::user();

        Return view('showBranch')->with('branchs', $branch)
        ->with('areas', $area)
        ->with('details', $detail);
    }

    public function edit($id) {
        $branch = Branch::all()->where('id', $id);

        Return view('editBranch')->with('branchs', $branch)
                                    ->with('areas', Area::all())
                                    ->with('details', Auth::user());
    }

    public function update() {
        $r = request();

        $branch = Branch::find($r->id);

        $branch->name=$r->branchName;
        $branch->location=$r->location;
        $branch->numberOfHalls=$r->numberOfHalls;
        $branch->seatingCapacity=$r->seatingCapacity;
        $branch->areaId=$r->areaId;
        $branch->save();

        Session::flash('success',"Branch update Successful!");
        Return redirect()->route('viewBranch');

    }

    public function viewBranches(){
        $branch = DB::table('branches')
        ->select('branches.*')
        ->orderBy('id')
        ->get();

        $area = Area::all();
        
        Return view('branches')->with('branches', $branch)
        ->with('areas', $area);
    }

    public function adminSearchBranch(){
        $r=request();
        $keywordBranch=$r->keywordBranch;
        $branch=DB::table('branches')
        ->where('branches.name','like','%'.$keywordBranch.'%')
        ->orderBy('id')
        ->paginate(5);
        $area = Area::all();
        $detail = Auth::user();

        Return view('showBranch')->with('branchs',$branch)
                                 ->with('details', $detail)
                                 ->with('areas', $area);
        
    }  

    public function searchBranch(){
        $r=request();
        $keywordBranch=$r->keywordBranch;
        $branch=DB::table('branches')
        ->where('branches.name','like','%'.$keywordBranch.'%')
        ->get();
        $area = Area::all();  

        Return view('branches')->with('branches',$branch)
                                ->with('areas', $area);
    }
}
