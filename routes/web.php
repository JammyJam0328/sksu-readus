<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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








Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    switch (auth()->user()->role) {
        case 'admin':
            return redirect('/admin/dashboard');
            break;
        case 'user':
            return redirect('/');
            break;
    }
})->name('dashboard');

// user routes
Route::get('/setting-up', function(){
    if (!auth()->user() || auth()->user()->hasInfo==true) {
       return redirect()->back();
    }
    return view('user-pages.start');
});

Route::middleware(['auth:sanctum', 'verified','users'])->group(function () {
    Route::get('/',function(){
        return view('user-pages.home');
    })->name('home');

    Route::get('/post/{post_id}',[UserController::class,'viewpost'])->name('view-post');
});