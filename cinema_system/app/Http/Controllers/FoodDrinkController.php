<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use App\Models\foodDrink; 
use App\Models\Category;
use Session;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class FoodDrinkController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //the construct require user login before access the controller function
    }

    
    public function index(){
        $category = Category::all();

        $foodDrink=foodDrink::all(); 
        $detail = Auth::user();

        $length = count($category);
        $check = "Yes";

        for($x = 0; $x< $length; $x++) {
            if(!empty($category)) {
                $check = "No";
                break;

            }else {
                $check = "Yes";
            }
        }

        if($check == "Yes") {
            Session::flash('danger',"Please insert category first!");
            Return redirect()->route('viewCategory');

        }else {
            Return view('insertFoodDrink')->with('foodDrinks',$foodDrink)
                                        ->with('details', $detail)
                                        ->with('categories', $category);
        }

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

        $detail = Auth::user();

        Return view('showFoodDrink')->with('foodDrinks',$foodDrink)
        ->with('details', $detail);
    }

    public function viewAll(){
        $foodDrink=foodDrink::all();

        Return view('foodDrinks')->with('foodDrinks',$foodDrink);
    }

    public function foodDrinkDetail($id){
        $foodDrink=foodDrink::all()->where('id',$id);
        $user=DB::table('users')
        ->where('users.id','=',Auth::id())
        ->get();
        Return view('foodDrinkDetail')->with('foodDrinks',$foodDrink)
        ->with('users', $user);
    }

    public function delete($id){
        $delete=foodDrink::find($id);
        $delete->delete();
        Session::flash('danger',"Food & Drink deleted successful!");
        Return redirect()->route('viewFoodDrink');
    }

    public function edit($id){
        $foodDrinks=foodDrink::all()->where('id',$id);
        $detail = Auth::user();

        Return view('editFoodDrink')->with('foodDrinks',$foodDrinks)
                                    ->with('categories',Category::all())
                                    ->with('details', $detail);
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

    public function adminSearchFoodDrink(){
        $r=request();
        $keywordFoodDrink=$r->keywordFoodDrink;
        $foodDrink=DB::table('food_drinks')
        ->where('food_drinks.name','like','%'.$keywordFoodDrink.'%')
        ->orWhere('food_drinks.category','like',$keywordFoodDrink)
        ->paginate(5); 
        $detail = Auth::user();

        Return view('showFoodDrink')->with('foodDrinks',$foodDrink)
                                    ->with('details', $detail);
                               
        
    }  

    public function searchFoodDrink(){
        $r=request();
        $keywordFoodDrink=$r->keywordFoodDrink;
        $foodDrink=DB::table('food_drinks')
        ->where('food_drinks.name','like','%'.$keywordFoodDrink.'%')
        ->get();  

        Return view('foodDrinks')->with('foodDrinks',$foodDrink);
    }  

    public function homePageFoodDrink(){
        $foodDrink=foodDrink::all();
        Return view('welcome')->with('foodDrinks',$foodDrink);                     
    }
}
