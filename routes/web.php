<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\Meal;

Route::get('/', function () {
    // return view('welcome');
     $meals = Meal::all();
    return view('index', compact('meals'));

});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
