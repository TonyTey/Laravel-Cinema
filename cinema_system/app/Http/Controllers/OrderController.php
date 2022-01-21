<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Order;
use App\Models\Book;
use App\Models\Record;
use App\Models\History;
use Session;
use Auth;
use PDF;
use App\Models\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //the construct require user login before access the controller function
    }

    public function addOrder()
    {
        $book = Book::all()->where('userId', Auth::id());

        $length = count($book);

        if ($length != 0) {
            $r = request();

            $addOrder = Order::create([

                'foodName' => $r->foodName,
                'foodPrice' => $r->foodPrice,
                'foodQuantity' => $r->foodQuantity,
                'foodCategory' => $r->foodCategory,
                'userId' => $r->userId,

            ]);

            $addRecord = Record::create([

                'foodName' => $r->foodName,
                'foodPrice' => $r->foodPrice,
                'foodQuantity' => $r->foodQuantity,
                'foodCategory' => $r->foodCategory,
                'userId' => $r->userId,
                'orderId' => $addOrder->id,

            ]);

            Session::flash('success', "Ordered successful!");
            return redirect()->route('foodDrinks');
        } else {
            Session::flash('danger', "Ordered unsuccessful! Please book a movie first!");
            return redirect()->route('movieLists');
        }
    }

    public function showOrder()
    {
        $order = History::all()->where('userId', Auth::id());

        return view('showOrderHistory')->with('orders', $order);
    }

    public function orderInfoMore($id)
    {
        $history = History::all()->where('id', $id);
        $user = User::all()->where('id', Auth::id());
        $order = Record::all()->where('userId', Auth::id());
        $amountFood = DB::table('histories')->select(DB::raw('*'))->where('id', '=', $id)->sum('foodDrinkPrice');

        $foodId = explode(',', $history->first()->foodID);

        return view('orderInfoMore')->with('histories', $history)
            ->with('users', $user)
            ->with('orders', $order)
            ->with('foodID', $foodId)
            ->with('amountFoods', $amountFood);
    }

    public function receipt($id)
    {
        $receipt = History::all()
            ->where('userId', Auth::id())
            ->where('id', $id);

        if ($receipt->first()->foodID == '') {
            $pdf = PDF::loadView('receiptWithoutFoodDrink', ['payments' => $receipt]);

            return $pdf->download('Receipt.pdf');
        } else {
            $record = Record::all()->where('userId', Auth::id());

            $foodID = explode(',', $receipt->first()->foodID);

            $pdf = PDF::loadView('paymentReceipt', ['payments' => $receipt, 'foods' => $record, 'foodID' => $foodID]);

            return $pdf->download('Receipt.pdf');
        }
    }
}
