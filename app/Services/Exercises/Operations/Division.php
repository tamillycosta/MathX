<?php

namespace App\Services\Exercises\Operations;

use App\Services\Exercises\Exercise;


class Division extends Exercise{


    public function generateQuestion($min, $max, $numOperands = 2): string
    {
       
            $expression = $this->generateOperators($min,$max,$numOperands);
            $exercises = implode(' / ', $expression);
        
        
        return $exercises;
    }
}



?>