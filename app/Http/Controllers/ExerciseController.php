<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Services\Exercises\Factorys\ExerciseFactory;
use Illuminate\View\View;   
use App\Services\Exercises\Exercise;
use Illuminate\Http\Response;
class ExerciseController extends Controller
{
    
    public static function showGenareteExecises(StorePostRequest $request): View{
             
       $exercises = self::genareteExecises(request: $request);
       $answer = self::genareteAnswer(questions: $exercises);

        session(key: ['exercises'=> $exercises]);
        session(key: ['answers' => $answer]);

       return view(view: 'genarator.operations',  data: ["exercises" => $exercises]);
    }


    public static function genareteAnswer(array $questions): array{
       return  Exercise::generateAnswer($questions);
    }


    public static function exportExercies(): Response{
        $content =   Exercise::createExportFile();
        $filename = 'exercises_'. env('APP_NAME') . '_' . date('Ymd') . 'txt';
      
        return response($content)->header("Content-Type", "text/plain")
        ->header('Content-Disposition', 'attachment ; filename = "'.$filename.'"');
    }


    public function printExercies(): View{
        return view('genarator.printExercises');
    }

    private static function genareteExecises(StorePostRequest $request): array{
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
}
