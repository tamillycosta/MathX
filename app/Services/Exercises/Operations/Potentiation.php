<?php

namespace App\Services\Exercises\Operations;

use App\Services\Exercises\Exercise;

class Potentiation extends Exercise{
    
    public function generateQuestion($base, $potency): string{
        $expression = $this->generateOperators($potency,$base,2);
        $exercises = implode(' ^ ', $expression);
        return $exercises;
    }


    public static function generateAnswer(array $quenstions){
        $answers = []; 
        foreach($quenstions as $expressions){
            [$base,$expoente] = explode('^', $expressions);
            $answers[] = pow((int)$base, (int)$expoente);
        }

        return $answers;
    }
}


?>