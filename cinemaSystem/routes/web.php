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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insertArea',[App\Http\Controllers\AreaController::class, 'index'])->name('loadInsertArea');
Route::post('/insertArea/store',[App\Http\Controllers\AreaController::class, 'store'])->name('addArea');
Route::get('/showArea',[App\Http\Controllers\AreaController::class, 'view'])->name('viewArea');
Route::get('/deleteArea/{id}',[App\Http\Controllers\AreaController::class, 'delete'])->name('deleteArea');
Route::get('/editArea/{id}',[App\Http\Controllers\AreaController::class, 'edit'])->name('editArea');
Route::post('/updateArea',[App\Http\Controllers\AreaController::class, 'update'])->name('updateArea');

Route::get('/insertBranch',[App\Http\Controllers\BranchController::class, 'index'])->name('loadInsertBranch');
Route::post('/insertBranch/store',[App\Http\Controllers\BranchController::class, 'store'])->name('addBranch');
Route::get('/showBranch',[App\Http\Controllers\BranchController::class, 'view'])->name('viewBranch');
Route::get('/deleteBranch/{id}',[App\Http\Controllers\BranchController::class, 'delete'])->name('deleteBranch');
Route::get('/editBranch/{id}',[App\Http\Controllers\BranchController::class, 'edit'])->name('editBranch');
Route::post('/updateBranch',[App\Http\Controllers\BranchController::class, 'update'])->name('updateBranch');

Route::get('/insertCategory', [App\Http\Controllers\CategoryController::class, 'index'])->name('insertCategory');
Route::post('/insertCategory/store',[App\Http\Controllers\CategoryController::class, 'store'])->name('addCategory');
Route::get('/viewCategory',[App\Http\Controllers\CategoryController::class, 'view'])->name('viewCategory');
Route::get('/deleteCategory/{id}',[App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory');
Route::get('/editCategory/{id}',[App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
Route::post('/updateCategory',[App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');

Route::get('/foodDrinks',[App\Http\Controllers\FoodDrinkController::class, 'viewAll'])->name('foodDrinks');
Route::get('/viewDetail/{id}',[App\Http\Controllers\FoodDrinkController::class, 'foodDrinkDetail'])->name('viewDetail');
Route::get('/insertFoodDrink', function () {
    return view('insertFoodDrink',['category' => App\Models\Category::all()]);
});
Route::post('/insertFoodDrink/store',[App\Http\Controllers\FoodDrinkController::class, 'store'])->name('addFoodDrink');
Route::get('/viewFoodDrink',[App\Http\Controllers\FoodDrinkController::class, 'view'])->name('viewFoodDrink'); 
Route::get('/editFoodDrink/{id}',[App\Http\Controllers\FoodDrinkController::class, 'edit'])->name('editFoodDrink');
Route::post('/updateFoodDrink',[App\Http\Controllers\FoodDrinkController::class, 'update'])->name('updateFoodDrink');
Route::get('/deleteFoodDrink/{id}',[App\Http\Controllers\FoodDrinkController::class, 'delete'])->name('deleteFoodDrink');
Route::get('addNewFoodDrink', function()
{
    return view('insertFoodDrink',['category' => App\Models\Category::all()]);
});

Route::get('addNewCategory', function()
{
    return view('insertCategory');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
