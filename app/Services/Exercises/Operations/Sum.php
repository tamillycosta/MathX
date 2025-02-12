<?php

namespace App\Services\Exercises\Operations;

use App\Services\Exercises\Exercise;

class Sum extends Exercise {

    public function generateQuestion($min, $max, $numOperands = 2): string
     {
           
            $expression = $this->generateOperators($min,$max,$numOperands);
            $exercises = implode(separator: ' + ', array: $expression) ;
            
        
        return $exercises;        

    }

    
}



?>