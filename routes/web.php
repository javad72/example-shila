<?php

use Illuminate\Support\Facades\Route;

Route::get('/user-edit', [\App\Http\Controllers\Users::class , 'userEdit']);
