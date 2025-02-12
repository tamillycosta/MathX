<?php

namespace App\Services\Game\Levels;

use App\Services\Exercises\Operations\Multiplication;
use App\Services\Exercises\Operations\Division;
use App\Services\Game\Level;
use App\Services\Exercises\Exercise;

class Medium extends Level{

    public static function setGameLevel(int $numQuestions){
        $exercices = Easy::setGameLevel(1);
        $multi = new  Multiplication();
        $division = new Division();

        for($i=0; $i < $numQuestions; $i++){
            $numOperands = rand(2,4);
            $exercices  [] = $multi->generateQuestion(20,100,$numOperands);
            $exercices  [] = $division->generateQuestion(20,100,$numOperands);
        }

        return $exercices;
    }

    public function getAnswer($quenstions){
        return Exercise::generateAnswer($quenstions);
    }
}


?>