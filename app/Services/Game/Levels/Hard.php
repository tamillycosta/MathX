<?php

namespace App\Services\Game\Levels;

use App\Services\Exercises\Exercise;
use App\Services\Exercises\Operations\Potentiation;
use App\Services\Game\Level;

class Hard extends Level{

    public static function setGameLevel(int $numQuestions){
      
        $exercices = [];
        $potentiation = new Potentiation;

        for($i = 0; $i < $numQuestions; $i++){
            
            $exercices [] = $potentiation->generateQuestion(10,5 );
        }
        
       

        return $exercices;
    }


    public function getAnswer($quenstions){
        return Exercise::generateAnswer($quenstions);
    }
}


?>