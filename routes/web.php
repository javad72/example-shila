<?php

use Illuminate\Support\Facades\Route;

Route::get('/user-edit', [\App\Http\Controllers\Users::class , 'userEdit']);
Route::post('/user-update', [\App\Http\Controllers\Users::class , 'userUpdate'])->name('user.update');
