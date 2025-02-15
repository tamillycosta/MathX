<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\hasExercises;


// Rotas da pagina principal 
Route::controller(MainController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/generates', 'exercisesHome')->name('exercisesHome');
    Route::get('/game','gameHome')->name('game');
   
}); 


// Rotas do gerador de exercicios 
    Route::controller(ExerciseController::class)->group(function(){
 
    Route::prefix('Exercises')->group(function(){
        Route::post('/generate', 'showGenareteExecises')->name('genarete');
        Route::get('/print', action: 'printExercies')->name('print')->middleware(hasExercises::class);
        Route::get('/export','exportExercies' )->name('export')->middleware(hasExercises::class);
    });
    
});


//Rotas do game 
Route::controller(GameController::class)->group(function(){
    Route::prefix('game')->group(function(){
        
        Route::post('/setLevel', 'gameLevel')->name('setLevel');
        Route::get('/question',  'gameLoop')->name('game.question');
        Route::post('/next',  'nextQuestion')->name('game.next');
        Route::get('/answer/{answer}', 'getAnswer')->name('game.answer');
        Route::get('/next', 'nextQuestion')->name('game.next');
        Route::get('/end', 'gameEnd')->name('game.end');
    });
});