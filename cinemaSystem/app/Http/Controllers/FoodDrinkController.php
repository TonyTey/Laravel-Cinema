<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use App\Models\foodDrink; 
use App\Models\Category;
use Session;

class FoodDrinkController extends Controller
{
    public function index(){

        $foodDrink=foodDrink::all(); 

        Return view('insertFoodDrink')->with('foodDrinks',$foodDrink);
    }

    public function store(){
        $r=request(); 
        $image=$r->file('foodDrink-image');
        $image->move('images',$image->getClientOriginalName());                 
        $imageName=$image->getClientOriginalName();

        $addFoodDrink=foodDrink::create([

            'id'=>$r->id, 
            'name'=>$r->name,
            'image'=>$imageName,
            'price'=>$r->price,
            'quantity'=>$r->quantity,
            'description'=>$r->description,
            'category'=>$r->category,

        ]);
        Session::flash('success',"Food & Drink added successful!");
        Return redirect()->route('viewFoodDrink');
    }

    public function view(){
        $foodDrink=DB::table('food_drinks')
        ->leftjoin('categories','categories.name','=','food_drinks.category')
        ->select('food_drinks.*','categories.id as catid','categories.name as catname')
        ->get();
        Return view('showFoodDrink')->with('foodDrinks',$foodDrink);
    }

    public function viewAll(){
        $foodDrink=foodDrink::all();
        Return view('foodDrinks')->with('foodDrinks',$foodDrink);
    }

    public function foodDrinkDetail($id){
        $foodDrink=foodDrink::all()->where('id',$id);
        Return view('foodDrinkDetail')->with('foodDrinks',$foodDrink);
    }

    public function delete($id){
        $delete=foodDrink::find($id);
        $delete->delete();
        Session::flash('danger',"Food & Drink deleted successful!");
        Return redirect()->route('viewFoodDrink');
    }

    public function edit($id){
        $foodDrinks=foodDrink::all()->where('id',$id);
        Return view('editFoodDrink')->with('foodDrinks',$foodDrinks)
                                    ->with('category',Category::all());
    }

    public function update(){
        $r=request();
        $foodDrinks=foodDrink::find($r->id); 
      
        if($r->file('foodDrink-image')!=''){
            $image=$r->file('foodDrink-image');
            $image->move('images',$image->getClientOriginalName());                  
            $imageName=$image->getClientOriginalName();
            $foodDrinks->image=$imageName;
        }

        $foodDrinks->name=$r->name; 
        $foodDrinks->description=$r->description;
        $foodDrinks->quantity=$r->quantity;
        $foodDrinks->price=$r->price;
        $foodDrinks->category=$r->category;
        $foodDrinks->save();

        Session::flash('success',"Food & Drink updated successful!");
        Return redirect()->route('viewFoodDrink'); 
    }
}
