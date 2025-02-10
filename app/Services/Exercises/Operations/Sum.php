<?php

namespace App\Services\Exercises\Operations;

use App\Services\Exercises\Exercise;

class Sum extends Exercise {

    public function generateQuestion($min, $max, $numOperands = 2): string
     {
            $expression = [];
            for ($j = 0; $j < $numOperands; $j++) {
                $expression[] = rand(min: $min, max: $max);
            }

            $exercises = implode(separator: ' + ', array: $expression) ;
            
        
        return $exercises;        

    }

    
}



?>