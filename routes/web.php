<?php

use Illuminate\Support\Facades\Route;


Route::domain(env('ADMIN'))->group(base_path('routes/sub/admin.php'));
Route::domain(env('TUTOR'))->group(base_path('routes/sub/tutor.php'));