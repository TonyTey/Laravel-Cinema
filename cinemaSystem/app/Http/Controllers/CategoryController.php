<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function index(){

        $category=Category::all(); 

        Return view('insertCategory')->with('categories',$category);
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
        Return view('showCategory')->with('categories',$category);
    }

    public function delete($id){
        $delete=Category::find($id);
        $delete->delete();
        Session::flash('danger',"Category deleted successful!");
        Return redirect()->route('viewCategory');
    }

    public function edit($id){
        $category=Category::all()->where('id',$id);
        Return view('editCategory')->with('categories',$category);
                                    
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
}
