<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', function () {
    return view('newBook');
});


Route::get('/insertArea',[App\Http\Controllers\AreaController::class, 'index'])->name('loadInsertArea');
Route::post('/insertArea/store',[App\Http\Controllers\AreaController::class, 'store'])->name('addArea');
Route::get('/showArea',[App\Http\Controllers\AreaController::class, 'view'])->name('viewArea');
Route::get('/deleteArea/{id}',[App\Http\Controllers\AreaController::class, 'delete'])->name('deleteArea');
Route::get('/editArea/{id}',[App\Http\Controllers\AreaController::class, 'edit'])->name('editArea');
Route::post('/updateArea',[App\Http\Controllers\AreaController::class, 'update'])->name('updateArea');
Route::post('/showArea',[App\Http\Controllers\AreaController::class, 'searchArea'])->name('search.area');

Route::get('/insertBranch',[App\Http\Controllers\BranchController::class, 'index'])->name('loadInsertBranch');
Route::post('/insertBranch/store',[App\Http\Controllers\BranchController::class, 'store'])->name('addBranch');
Route::get('/showBranch',[App\Http\Controllers\BranchController::class, 'view'])->name('viewBranch');
Route::get('/deleteBranch/{id}',[App\Http\Controllers\BranchController::class, 'delete'])->name('deleteBranch');
Route::get('/editBranch/{id}',[App\Http\Controllers\BranchController::class, 'edit'])->name('editBranch');
Route::post('/updateBranch',[App\Http\Controllers\BranchController::class, 'update'])->name('updateBranch');
Route::post('/showBranch',[App\Http\Controllers\BranchController::class, 'adminSearchBranch'])->name('adminsearch.branch');
Route::post('/branches',[App\Http\Controllers\BranchController::class, 'searchBranch'])->name('search.branch');

Route::get('/insertMovie',[App\Http\Controllers\MovieController::class, 'index'])->name('loadInsertMovie');
Route::get('/showMovie',[App\Http\Controllers\MovieController::class, 'view'])->name('viewMovie');
Route::post('/insertMovie/details', [App\HTTP\Controllers\MovieController::class, 'details'])->name('insertDetails');
Route::post('/insertMovie/details/video', [App\HTTP\Controllers\MovieController::class, 'upload'])->name('videoUpload');
Route::post('/insertMovie/details/video/store', [App\HTTP\Controllers\MovieController::class, 'store'])->name('addMovie');
Route::get('/editMovie/{id}',[App\Http\Controllers\MovieController::class, 'edit'])->name('editMovie');
Route::get('/deleteMovie/{id}',[App\Http\Controllers\MovieController::class, 'delete'])->name('deleteMovie');
Route::post('/editMovie/updateDetails', [App\HTTP\Controllers\MovieController::class, 'updateDetails'])->name('updateDetail');
Route::post('/editMovie/updateDetails/updateVideo', [App\HTTP\Controllers\MovieController::class, 'updateVideo'])->name('updateMovie');
Route::get('/movie/{id}/showDetails',[App\Http\Controllers\MovieController::class, 'movieDetail'])->name('viewMovieDetails');
Route::post('/movieLists',[App\Http\Controllers\MovieController::class, 'searchMovie'])->name('search.movie');
Route::post('/showMovie',[App\Http\Controllers\MovieController::class, 'adminSearchMovie'])->name('admin.search.movie');

Route::get('/insertDateTime', [App\Http\Controllers\DateTimeController::class, 'index'])->name('insertDateTime');
Route::post('/insertDateTime/loadDateTime',[App\Http\Controllers\DateTimeController::class, 'load'])->name('loadDateTime');
Route::post('/insertDateTime/store',[App\Http\Controllers\DateTimeController::class, 'store'])->name('addDateTime');
Route::get('/showDateTime', [App\Http\Controllers\DateTimeController::class, 'view'])->name('viewDateTime');
Route::get('/deleteDateTime/{id}',[App\Http\Controllers\DateTimeController::class, 'delete'])->name('deleteDateTime');
Route::get('/editDateTime/{id}',[App\Http\Controllers\DateTimeController::class, 'edit'])->name('editDateTime');
Route::post('/updateDateTime',[App\Http\Controllers\DateTimeController::class, 'update'])->name('updateDateTime');
Route::get('/showDateTimeDetail/{id}',[App\Http\Controllers\DateTimeController::class, 'details'])->name('viewDateTimeDetail');
Route::post('/showDateTime', [App\Http\Controllers\DateTimeController::class, 'searchDateTime'])->name('search.dateTime');


Route::get('/insertCategory', [App\Http\Controllers\CategoryController::class, 'index'])->name('insertCategory');
Route::post('/insertCategory/store',[App\Http\Controllers\CategoryController::class, 'store'])->name('addCategory');
Route::get('/viewCategory',[App\Http\Controllers\CategoryController::class, 'view'])->name('viewCategory');
Route::get('/deleteCategory/{id}',[App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory');
Route::get('/editCategory/{id}',[App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
Route::post('/updateCategory',[App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
Route::post('/viewCategory',[App\Http\Controllers\CategoryController::class, 'searchCategory'])->name('search.category');

Route::get('/foodDrinks',[App\Http\Controllers\FoodDrinkController::class, 'viewAll'])->name('foodDrinks');
Route::get('/viewDetail/{id}',[App\Http\Controllers\FoodDrinkController::class, 'foodDrinkDetail'])->name('viewDetail');

Route::get('/insertNewFoodDrinks',[App\Http\Controllers\FoodDrinkController::class, 'index'])->name('insertFoodDrinks'); 
Route::post('/insertFoodDrink/store',[App\Http\Controllers\FoodDrinkController::class, 'store'])->name('addFoodDrink');
Route::get('/viewFoodDrink',[App\Http\Controllers\FoodDrinkController::class, 'view'])->name('viewFoodDrink'); 
Route::get('/editFoodDrink/{id}',[App\Http\Controllers\FoodDrinkController::class, 'edit'])->name('editFoodDrink');
Route::post('/updateFoodDrink',[App\Http\Controllers\FoodDrinkController::class, 'update'])->name('updateFoodDrink');
Route::get('/deleteFoodDrink/{id}',[App\Http\Controllers\FoodDrinkController::class, 'delete'])->name('deleteFoodDrink');
Route::post('/viewFoodDrink',[App\Http\Controllers\FoodDrinkController::class, 'adminSearchFoodDrink'])->name('adminSearch.foodDrink');
Route::post('/foodDrinks',[App\Http\Controllers\FoodDrinkController::class, 'searchFoodDrink'])->name('search.foodDrink');

Route::get('/viewBook',[App\Http\Controllers\BookController::class, 'view'])->name('viewBook');
Route::post('/viewBook/search',[App\Http\Controllers\BookController::class, 'searchUserBooking'])->name('search.user.booking');
Route::get('/viewBook/more/{id}',[App\Http\Controllers\BookController::class, 'moreDetail'])->name('viewBookingHistory');

// CRUD Food drink
Route::get('/foodDrinks',[App\Http\Controllers\FoodDrinkController::class, 'viewAll'])->name('foodDrinks');
Route::post('/foodDrinks',[App\Http\Controllers\FoodDrinkController::class, 'searchFoodDrink'])->name('search.foodDrink');
Route::get('/viewDetail/{id}',[App\Http\Controllers\FoodDrinkController::class, 'foodDrinkDetail'])->name('viewDetail');

// Add Order Food Drink
Route::post('/addOrder',[App\Http\Controllers\OrderController::class, 'addOrder'])->name('add.to.order');

// Movie list & movie detail
Route::get('/movieLists',[App\Http\Controllers\MovieController::class, 'viewAll'])->name('movieLists');
Route::middleware(['auth:sanctum', 'verified'])->get('/movieDateConfirm/{id}',[App\Http\Controllers\MovieController::class, 'confirmDate'], function()
{})->name('movieDateConfirm');

Route::post('/movieDateConfirm/movieListDetail',[App\Http\Controllers\MovieController::class, 'movieListsDetail'])->name('movieListDetail');

Route::get('/viewMovieListsInfoMore/{id}',[App\Http\Controllers\MovieController::class, 'movieListsInfoMore'], function()
{
    return view('movieListsDetail');
})->name('viewMovieListsInfoMore');

Route::get('/',[App\Http\Controllers\MovieController::class, 'homePageMovie'])->name('welcome');

//Ticket Booking
Route::post('/insertBook/store',[App\Http\Controllers\BookController::class, 'insertBook'])->name('insertNewBook');

//Branches
Route::get('/branches',[App\Http\Controllers\BranchController::class, 'viewBranches'])->name('branches'); 

// Payment
Route::get('/makePayment', [App\Http\Controllers\PaymentController::class, 'view'],function () {
    return view('makePayment', ['movieName' => App\Models\Book::all()]);
})->name('makePayment');
Route::post('/makePayment/store',[App\Http\Controllers\PaymentController::class, 'store'])->name('addPayment');
Route::get('/viewPayment',[App\Http\Controllers\PaymentController::class, 'viewPayment'])->name('viewPayment'); 
Route::post('\checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');
//End Payment

//View Order History
Route::get('/viewOrderHistory',[App\Http\Controllers\OrderController::class, 'showOrder'])->name('viewOrderHistory'); 
Route::get('/viewOrderHistory/infoMore/{id}',[App\Http\Controllers\OrderController::class, 'orderInfoMore'])->name('orderInfoMore');
Route::get('/viewOrderHistory/inforMore/{id}/receipt', [App\Http\Controllers\OrderController::class, 'receipt'])->name('receipt.download'); 
//End Order History

//Payment Receipt
Route::get('/receipt',[App\Http\Controllers\PaymentController::class, 'receiptAfterPay'])->name('receipt');

Route::get('/test',[App\Http\Controllers\PaymentController::class, 'test'])->name('test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('home');

Route::get('/home/logout', [App\Http\Controllers\AuthController::class, 'log_out'])->name('log-out');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    if(Auth::id() == 1) {
        return view('layouts.dashboard');
    }else {
        return redirect()->route('welcome');
    }
})->name('dashboard');