<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Middleware\Authenticate;

Route::get('/signin', function () {
    if (Auth::check()) {
        return redirect()->route('tutor.index');
    } else {
        return view('tutor.auth.login');
    }
})->name('login');

Route::get('/signup', function () {
    if (Auth::check()) {
        return redirect()->route('tutor.index');
    } else {
        return view('tutor.auth.register');
    }
})->name('register');

Route::get('/signout', function () {
    Auth::logout();
    
    // Invalidate the session and regenerate the token.
    session()->invalidate();
    session()->regenerateToken();

    return redirect('/signin');
    
})->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/', function () {
        return view('tutor.index');
    })->name('tutor.index');

});
