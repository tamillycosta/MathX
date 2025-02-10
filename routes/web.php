<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\hasExercises;



Route::controller(MainController::class)->group(function(){

    
    Route::get('/', 'home')->name('home');
    Route::get('/generates', 'exercisesHome')->name('exercisesHome');

   
}); 

// Rotas do gerador de exercicios 
    Route::controller(ExerciseController::class)->group(function(){
 
    Route::prefix('Exercises')->group(function(){
        Route::post('/generate', 'showGenareteExecises')->name('genarete');
        Route::get('/print', action: 'printExercies')->name('print')->middleware(hasExercises::class);
        Route::get('/export','exportExercies' )->name('export')->middleware(hasExercises::class);
    });
    
});