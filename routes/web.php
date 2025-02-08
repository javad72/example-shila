<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Users::class , 'index'])->name('users');
Route::get('/user-edit', [\App\Http\Controllers\Users::class , 'userEdit'])->name('user.edit');
Route::post('/user-update', [\App\Http\Controllers\Users::class , 'update'])->name('user.update');
Route::post('/user-change-status', [\App\Http\Controllers\Users::class , 'userChangeStatus'])->name('user.change.status');
