<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;   
use Illuminate\Http\Response;

class MainController extends Controller
{

    public function home():View{
    // apresentar  a home
    return view('home');
    }

    public function genareteExecises(StorePostRequest $request): View{
        
       $exercises = ExerciseController::genareteExecises(request: $request);
       $answer = ExerciseController::genareteAnswer(questions: $exercises);
        
        session(key: ['exercises'=> $exercises]);
        session(key: ['answers' => $answer]);

       return view(view: 'operations', data: ["exercises" => $exercises]);

    }

    public function printExercies(): View{
      
        return view('printExercises');
    }

    public function exportExercies(): Response{
        // exporta os exercicios 
        return ExerciseController::exportExercies();
        
        }

}
