<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Branch;
use App\Models\Area;

class BranchController extends Controller
{
    public function index() {
        $area = Area::all();
        Return view('insertBranch')->with('areas', $area);
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

        Return redirect()->route('viewBranch');
    }

    public function delete($id) {
        $delete = Branch::find($id);
        $delete->delete();

        Return redirect()->route('viewBranch');
    }

    public function view() {
        $branch = DB::table('branches')
        ->leftjoin('areas', 'areas.id', '=', 'branches.areaId')
        ->select('branches.*', 'areas.name as catname')
        ->get();

        Return view('showBranch')->with('branchs', $branch);
    }

    public function edit($id) {
        $branch = Branch::all()->where('id', $id);

        Return view('editBranch')->with('branchs', $branch)
                                    ->with('areas', Area::all());
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

        Return redirect()->route('viewBranch');

    }
}
