<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use App\Models\Category;
use App\Models\foodDrink;
use Session;
use Auth;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //the construct require user login before access the controller function
    }

    
    public function index(){

        $category=Category::all(); 
        $detail = Auth::user();

        Return view('insertCategory')->with('categories',$category)
        ->with('details', $detail);
    }

    public function store(){
        $r=request();
        $addCategory=Category::create([
            
            'id'=>$r->id, 
            'name'=>$r->name,

        ]);
        Return redirect()->route('viewCategory');
    }

    public function view(){
        $category=Category::all();
        $detail = Auth::user(); 

        Return view('showCategory')->with('categories',$category)
        ->with('details', $detail);
    }

    public function delete($id){
        $delete=Category::find($id);

        $foodDrink = DB::table('food_drinks')
        ->select('food_drinks.*')
        ->where('food_drinks.category', '=', $delete->name)
        ->get();

        $length = count($foodDrink);

        $check = "Yes";

        for($x =0; $x < $length; $x++) {
            if(!empty($foodDrink)) {
                $check = "No";
                break;

            }else {
                $check = "Yes";
            }
        }

        if($check == "Yes") {
            $delete->delete();
            Session::flash('success',"Category delete successful!");
            Return redirect()->route('viewCategory');

        }else {
            Session::flash('danger',"Category delete unsuccessful! There are still have food & drink under this category");
            Return redirect()->route('viewCategory');
        }
    }

    public function edit($id){
        $category=Category::all()->where('id',$id);
        $detail = Auth::user();

        Return view('editCategory')->with('categories',$category)
        ->with('details', $detail);
                                    
    }

    public function update(){
        $r=request();
        $categories=Category::find($r->id);

        $categories->id=$r->id;
        $categories->name=$r->name;
        $categories->save();
        Session::flash('success',"Category updated successful!");

        Return redirect()->route('viewCategory');
    }

    public function searchCategory(){
        $r=request();
        $keywordCategory=$r->keywordCategory;
        $category=DB::table('categories')
        ->where('categories.name','like','%'.$keywordCategory.'%')
        ->paginate(5);
        $detail = Auth::user();
        
        Return view('showCategory')->with('categories',$category)
                                   ->with('details', $detail);

    } 
}
