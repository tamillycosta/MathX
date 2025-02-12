<?php
namespace App\Services\Game;
use App\Services\Exercises\Exercise;


abstract class Level{

    public abstract static function setGameLevel(int $numQuestions);

    public function getWrongAnswer($quenstions): array{
        $wrongAnswers = [];
        $correctAnswers = Exercise::generateAnswer($quenstions);

        foreach($correctAnswers as $correct){
            $wrongSet = [];

            while(count($wrongSet) < 3){
                $wrong = rand($correct - 10, $correct + 10);

                if($wrong != $correct && !in_array($wrong,$wrongSet)){
                    $wrongSet [] = $wrong;
                }
            }
            $wrongAnswers[] = $wrongSet;
            
        }
        return $wrongAnswers;
    }

}




?>