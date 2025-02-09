<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\hasExercises;



Route::controller(MainController::class)->group(function(){

    Route::get('/', 'home')->name('home');
    Route::post('/generateExercises', 'genareteExecises')->name('genarete');
    Route::get('/printExercies', 'printExercies')->name('print')->middleware(hasExercises::class);
    Route::get('/exportExercies','exportExercies' )->name('export')->middleware(hasExercises::class);
}); 