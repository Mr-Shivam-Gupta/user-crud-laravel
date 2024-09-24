<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('user.index');
});
Route::resource('user', UserController::class);
