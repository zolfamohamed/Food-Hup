<?php

use Illuminate\Support\Facades\Route;
use App\Models\Meal;

Route::get('/', function () {
    // return view('welcome');
     $meals = Meal::all();
    return view('index', compact('meals'));

});
