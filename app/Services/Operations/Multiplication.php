<?php

namespace App\Services\Operations;

use App\Services\Exercise;

class Multiplication extends Exercise{

    public function generateQuestion($min, $max, $numOperands = 2): string
    {
        
        
            $expression = [];
            for ($j = 0; $j < $numOperands; $j++) {
                $expression[] = rand($min, $max);
            }

            $exercises = implode(' * ', $expression);
        
        
        return $exercises;
    }
}


?>