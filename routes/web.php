<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MealController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {

    
    if (Auth::check() && Auth::user()->is_admin == 1) {
        return redirect('/adminpage');
    }


    $meals = Meal::all();
    return view('index', compact('meals'));

})->name('index');


Route::get('/adminpage', function () {

    if (!Auth::check() || Auth::user()->is_admin != 1) {
        return redirect('/');
    }

    $meals = Meal::all();
    return view('adminpage', compact('meals'));

})->middleware('auth')->name('adminpage');



Route::middleware(['guest'])->group(function () {
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
});
Route::middleware(['auth'])->group(function () {
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout/', [CartController::class, 'checkout'])->name('cart.checkout');
});



Route::get('/Add item', [MealController::class, 'create'])->name('additem');
Route::post('/store', [MealController::class, 'store'])->name("storeitem");
Route::get('/edit/{meal}', [MealController::class, 'edit'])->name('edititem');
Route::put('/update/{meal}', [MealController::class, 'update'])->name('updateitem');
Route::delete('/delete/{meal}', [MealController::class, 'destroy'])->name('deleteitem');

