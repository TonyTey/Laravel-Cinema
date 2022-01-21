<?php

namespace App\Http\Controllers;

use Stripe;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Models\Payment;
use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Record;
use App\Models\demo;
use App\Models\History;
use Notification;
use Session;
use PDF;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //the construct require user login before access the controller function
    }

    public function paymentPost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->sub * 100,
            "currency" => "MYR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of PopCorn Cinema",
        ]);

        $items = request()->id;
        $payments = Payment::find($items);
        $payments->save();

        $email = 'weisongtey@gmail.com';
        Notification::route('mail', $email)->notify(new \App\Notifications\paymentPaid($email));

        $paymentID = Payment::find(request()->paymentID);

        $paymentHistory = History::create([
            'movieName' => $paymentID->movieName,
            'totalAmount' => $paymentID->totalAmount,
            'seatNo' => $paymentID->seatNo,
            'quantityTicket' => $paymentID->quantityTicket,
            'date' => $paymentID->date,
            'time' => $paymentID->time,
            'userId' => $paymentID->userId,
            'foodID' => $paymentID->foodID,
            'foodName' => $paymentID->foodName,
            'foodDrinkPrice' => $paymentID->foodDrinkPrice,
            'ticketPrice' => $paymentID->ticketPrice,
            'userName' => $paymentID->userName,
        ]);

        Session::flash('success', 'Payment successfully! Please wait a minute, receipt will automatic start download!');
        Session::flash('download.receipt', 'Receipt.pdf');

        return redirect()->route('viewOrderHistory');
    }

    public function view()
    {
        $payments = Payment::all()->where('userId', Auth::id());

        if (count($payments) != 0) {
            $payment = DB::table('payments')
                ->where('payments.userId', '=', Auth::id())
                ->get();
            $user = DB::table('users')
                ->where('users.id', '=', Auth::id())
                ->get();

            return view('showPayment')->with('payments', $payment)
                ->with('users', $user);
        } else {
            $movie = Book::all()->where('userId', Auth::id());

            $length = count($movie);

            if ($length != 0) {
                $payment = Payment::all()->where('userId', Auth::id());
                $order = DB::table('orders')
                    ->where('orders.userId', '=', Auth::id())
                    ->get();
                $book = DB::table('books')
                    ->where('books.userId', '=', Auth::id())
                    ->get();
                $user = User::all()->where('userId', Auth::id());;
                $amountFood = DB::table('orders')->select(DB::raw('*'))->where('userId', '=', Auth::id())->sum('foodPrice');

                return view('makePayment')->with('payments', $payment)
                    ->with('orders', $order)
                    ->with('books', $book)
                    ->with('users', $user)
                    ->with('amountFoods', $amountFood);
            } else {
                Session::flash('danger', "Please book a movie first!");
                return redirect()->route('movieLists');
            }
        }
    }

    public function store()
    {
        $r = request();

        $book = Book::all()->where('userId', Auth::id());
        $foodDrinkPrice = DB::table('orders')->select(DB::raw('*'))->where('userId', '=', Auth::id())->sum('foodPrice');

        if (!empty($r->foodDrinks)) {
            $foodName = implode(',', $r->foodName);
            $foodID = implode(',', $r->foodDrinks);
        } else {
            $foodName = '';
            $foodID = '';
        }

        $makePayment = Payment::create([
            'movieName' => $r->movieName,
            'totalAmount' => $r->totalAmount,
            'seatNo' => $r->seatNo,
            'quantityTicket' => $r->quantityTicket,
            'date' => $r->date,
            'time' => $r->time,
            'userId' => Auth::id(),
            'foodID' => $foodID,
            'foodName' => $foodName,
            'foodDrinkPrice' => $foodDrinkPrice,
            'ticketPrice' => $r->ticketPrice,
            'userName' => $r->userName,
        ]);
        

        $deleteBook = Book::find($r->movieID);
        $deleteBook->delete();

        if (!empty($r->foodDrinks)) {
            $length = count($r->foodDrinks);

            if ($length != 0) {
                for ($x = 0; $x < $length; $x++) {
                    $deleteOrder = Order::find($r->foodDrinks[$x]);
                    $deleteOrder->delete();
                }
            }
        }

        //$seatNo = implode(',', $r->seats);
        return redirect()->route('viewPayment');
    }

    public function viewPayment()
    {
        $payment = DB::table('payments')
            ->where('payments.userId', '=', Auth::id())
            ->get();
        $user = DB::table('users')
            ->where('users.id', '=', Auth::id())
            ->get();

        $record = Payment::all()->where('userId', Auth::id());
        $order = Record::all()->where('userId', Auth::id());

        $foodName = $record->first()->foodID;

        return view('showPayment')->with('payments', $payment)
            ->with('users', $user);
    }

    public function receiptAfterPay()
    {
        $receipt = Payment::all()->where('userId', Auth::id());

        if ($receipt->first()->foodID == '') {
            $pdf = PDF::loadView('receiptWithoutFoodDrink', ['payments' => $receipt]);

            $id = Payment::find($receipt->first()->id);
            $id->delete();

            return $pdf->download('Receipt.pdf');
        } else {
            $record = Record::all()->where('userId', Auth::id());
            $foodID = explode(',', $receipt->first()->foodID);

            $pdf = PDF::loadView('paymentReceipt', ['payments' => $receipt, 'foods' => $record, 'foodID' => $foodID]);

            $id = Payment::find($receipt->first()->id);
            $id->delete();

            return $pdf->download('Receipt.pdf');
        }
    }
}
