<?php

use Illuminate\Support\Facades\Route;


use App\Http\Middleware\Authenticate;

Route::get('/signin', function () {
    if (Auth::check()) {
        return redirect()->route('admin.index');
    } else {
        return view('admin.auth.login');
    }
})->name('login');

Route::get('/signup', function () {
    if (Auth::check()) {
        return redirect()->route('admin.index');
    } else {
        return view('admin.auth.register');
    }
})->name('register');

Route::get('/signout', function () {
    Auth::logout();

    session()->invalidate();
    session()->regenerateToken();

    return redirect('/');
    
})->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

});
