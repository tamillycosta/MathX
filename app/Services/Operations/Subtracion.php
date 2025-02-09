<?php


namespace App\Services\Operations;

use App\Services\Exercise;

class Subtracion extends Exercise{

    public function generateQuestion($min, $max, $numOperands = 2): string{

        $expression = [];
        for($i = 0; $i < $numOperands; $i ++){
            $expression[] = rand($min, $max);
        }
        $exercises = implode(' - ', $expression);
       
        return $exercises;
    }
  
}

?>