<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; 
use App\Models\Book;
use App\Models\User;
use App\Models\Record;
use Auth;
use App\Models\History;

use Session;

class BookController extends Controller
{
    /*public function index(){

        $newBook=newBook::all(); 

        Return view('newBook')->with('newBooks',$newBook);
    }*/

    /*public function store(Request $request){
        $r=request(); 

        $seatNo = implode(',', $r->seats);

        $newBookTicket=newBook::create([

            'name'=>$r->name,
            'date'=>$r->date,
            'time'=>$r->time,
            'quantity'=>$r->quantity,
            'seatNo'=> $seatNo,
            'cinema'=>$r->cinema,
            'price'=>$r->price,

        ]);
        return redirect('newBook');
       
    }*/

    public function insertBook(Request $request){
        $r=request(); 
        $seatNo = implode(',', $r->seats);

        $insertNewBook=Book::create([

            'name'=>$r->name,
            'date'=>$r->date,
            'time'=>$r->time,
            'quantity'=>$r->quantity,
            'seatNo'=> $seatNo,
            'cinema'=>$r->cinema,
            'price'=>$r->price,
            'movieName'=>$r->movieName,
            'userId'=>$r->userId,

        ]);
        Session::flash('success',"Ticket purchased successful!");
        return redirect()->route('movieLists');
       
    }

    public function view() {
        $detail = Auth::user();
        $book= DB::table('histories')
        ->select('histories.*')
        ->paginate(5);

        Return view('showBookTicket')->with('books', $book)
                                     ->with('details', $detail);
    }

    public function searchUserBooking(){
        $r=request();
        $keywordUserBooking=$r->keywordUserBooking;
        $book=DB::table('histories')
        ->where('histories.movieName','like','%'.$keywordUserBooking.'%')
        ->paginate(5); 
        $detail = Auth::user();
        Return view('showBookTicket')->with('books',$book)
                                     ->with('details', $detail);
                               
        
    }

    public function moreDetail($id) {
        $book = History::all()->where('id', $id);
        $detail = Auth::user();
        $amountFood = DB::table('histories')->select(DB::raw('*'))->where('id', '=', $id)->sum('foodDrinkPrice');
        $order = Record::all()->where('userId', $book->first()->userId);

        $foodId = explode(',', $book->first()->foodID);

        return view('moreBookingHistory')->with('books', $book)
        ->with('orders', $order)
        ->with('foodID', $foodId)
        ->with('amountFoods', $amountFood)
        ->with('details', $detail);
    }
    
}

