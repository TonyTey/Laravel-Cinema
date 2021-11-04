<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Area;

class AreaController extends Controller
{
    public function store() {
        $r = request();
        $addArea = Area::create([
            'name' => $r->areaName,
        ]);

        Return redirect()->route('viewArea');
    }

    public function delete($id) {
        $delete = Area::find($id);
        $delete->delete();

        Return redirect()->route('viewArea');
    }

    public function edit($id) {
        $area = Area::all()->where('id', $id);
        Return view('editArea')->with('areas', $area);

    }

    public function update() {
        $r = request();
        $area = Area::find($r->areaId);

        $area->name=$r->areaName;
        $area->save();

        Return redirect()->route('viewArea');
    }

    public function view() {
        $area=Area::all();

        Return view('showArea')->with('areas', $area);
    }

    public function index() {
        Return view('insertArea');
    }

}
