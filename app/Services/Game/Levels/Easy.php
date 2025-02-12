<?php

namespace App\Services\Game\Levels;


use App\Services\Exercises\Exercise;
use App\Services\Game\Level;
use App\Services\Game\Strategy\GameFactory;
use App\Services\Exercises\Operations\Sum;
use App\Services\Exercises\Operations\Subtracion;


class  Easy extends Level{

    public static function setGameLevel(int $numQuestions): array {
        $quenstions = [];
        $sum = new Sum();
        $sub = new Subtracion();
        for($i = 0; $i < $numQuestions; $i++){
            $numOperands = rand(3,5);
             $quenstions [] = $sum->generateQuestion(10, 100, $numOperands);
             $quenstions [] = $sub->generateQuestion(10,100, $numOperands);
        }
        return $quenstions;
    }
    
    public function getAnswer($quenstions){
        return Exercise::generateAnswer($quenstions);
    }

  
}



?>