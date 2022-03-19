<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ReportController;



// google auth routes
Route::get('/auth/google', [GoogleAuthController::class,'redirectToGoogle'])->name('google.auth');
Route::get('/auth/google/callback',[GoogleAuthController::class,'handleGoogleCallback']);
// 





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
//information routes
Route::get('/setting-up', function(){
    if (!auth()->user() || auth()->user()->hasInfo==true) {
       return redirect()->back();
    }
    return view('user-pages.start');
});
// 

// main user routes
Route::middleware(['auth:sanctum', 'verified','users'])->group(function () {
    Route::get('/',function(){
        return view('user-pages.home');
    })->name('home');

    Route::get('/post/{post_id}',[UserController::class,'viewpost'])->name('view-post');

    Route::get('/profile/{email}/{id}',[UserController::class,'userprofile'])->name('user-profile');

    Route::get('/announcements',function(){
        return view('user-pages.announcement');
    })->name('announcements');

    Route::get('/events',function(){
        return view('user-pages.events');
    })->name('events');

    Route::get('/event/{event_id}',[UserController::class,'viewevent'])->name('view-event');
    Route::get('/announcement/{announcement_id}',[UserController::class,'viewannouncement'])->name('view-announcement');

    Route::get('/notifications',[UserController::class,'notification'])->name('notification');
    
    Route::get('/search',function(){
        return view('user-pages.search');
    })->name('search');

        
    Route::get('/report-content/{id}',[UserController::class,'reportcontent'])->name('report-content');


});
// admin routes
Route::prefix('admin')->middleware(['auth:sanctum', 'verified','admin'])->group(function () {
    Route::get('/dashboard',function(){
        return view('admin-pages.dashboard');
    })->name('admin-dashboard');
    Route::get('/users',function(){
        return view('admin-pages.users');
    })->name('admin-users');
    Route::get('/posts',function(){
        return view('admin-pages.posts');
    })->name('admin-posts');
    Route::get('/announcements',function(){
        return view('admin-pages.announcements');
    })->name('admin-announcements');
    Route::get('/events',function(){
        return view('admin-pages.events');
    })->name('admin-events');
    Route::get('/school',function(){
        return view('admin-pages.school');
    })->name('admin-school');

    Route::get('/reported-post',function(){
        return view('admin-pages.reported-post');
    })->name('admin-reported-post');

    Route::get('/report/post-per-campus',\App\Http\Livewire\Admin\GenerateReport::class)->name('report-post-per-campus');
     Route::get('/report/post-per-day-months',\App\Http\Livewire\Admin\GenerateReportPerDay::class)->name('report-post-per-day-months');

    //  version 2
    Route::get('/v2/dashboard',\App\Http\Livewire\VersionTwo\Admin\Dashboard::class)->name('vtwo-admin-dashboard');
    Route::get('/v2/users',\App\Http\Livewire\VersionTwo\Admin\ManageUsers::class)->name('vtwo-admin-users');
    Route::get('/v2/posts',\App\Http\Livewire\VersionTwo\Admin\ManagePosts::class)->name('vtwo-admin-posts');
    Route::get('/v2/announcements',\App\Http\Livewire\VersionTwo\Admin\ManageAnnouncements::class)->name('vtwo-admin-announcements');
    Route::get('/v2/events',\App\Http\Livewire\VersionTwo\Admin\ManageEvents::class)->name('vtwo-admin-events');
});