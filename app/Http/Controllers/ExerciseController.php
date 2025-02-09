<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Services\Factorys\ExerciseFactory;

use App\Services\Exercise;
use Illuminate\Http\Response;
class ExerciseController extends Controller
{
    public static function genareteExecises(StorePostRequest $request): array{
        $array = [];
        $operations  = $request->operations;
        $num_exercises = $request->number_exercises;
        $min = $request->number_one;
        $max =  $request->number_two;
        $operators = $request->operators;

        for($i = 0; $i <  $num_exercises; $i++){
            $operation = array_rand(array: $operations);
            $exercise = ExerciseFactory::genareteExercise( type: $operations[$operation]);
            $array[] = $exercise->generateQuestion($min, $max, $operators);
            
    }
    return  $array ;
}

    public static function genareteAnswer(array $questions): array{
       return  Exercise::generateAnswer($questions);
    }

    public static function  exportExercies(): Response{
        $content =   Exercise::createExportFile();
        $filename = 'exercises_'. env('APP_NAME') . '_' . date('Ymd') . 'txt';
      
        return response($content)->header("Content-Type", "text/plain")
        ->header('Content-Disposition', 'attachment ; filename = "'.$filename.'"');
    }
}
