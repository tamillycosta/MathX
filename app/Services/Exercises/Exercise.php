<?php
namespace App\Services\Exercises;

abstract class Exercise 
{
   
    public abstract function generateQuestion( int $min, int $max);


    public function generateOperators(int $min, int $max, $numOperands=2): array{
        $expression = [];
        for ($j = 0; $j < $numOperands; $j++) {
            $expression[] = rand(min: $min, max: $max);
        }
        return $expression;
    }


    public static function createExportFile(): string{
        $exercises = session('exercises');
       
        $solutions = session('answers');

        $content = '';
        $cont = 0;
        foreach($exercises as $exercise){
            $content .= $cont . '-' . $exercise . "\n";
            $cont++;
        }


        // solutions 
        $content .= "\n";
        $content  .=  "Soluções\n";
        $cont = 0;
        foreach($solutions as $solution ){
            $content .= $cont . '=' .  $solution  . "\n";
            $cont++;
        }

        return $content;
    }


    public static function generateAnswer(array $questions){
        $answers = array_map(callback: 'self::calculateExpression', array: $questions);

        return $answers;
    }

    private static function calculateExpression($expression) {
     
        $expression = preg_replace('/\s+/', '', $expression);
        $operators = ['*', '/', '+', '-'];
    
        preg_match_all('/(\d+|\+|\-|\*|\/)/', $expression, $tokens);
        $tokens = $tokens[0];

        foreach (['*', '/'] as $operator) {
            while (($index = array_search($operator, $tokens)) !== false) {
                $left = $tokens[$index - 1];
                $right = $tokens[$index + 1];
    
                if ($operator === '*') {
                    $result = $left * $right;
                } else {
                    $result = $right != 0 ? $left / $right : 0; 
                }
    
              
                array_splice($tokens, $index - 1, 3, $result);
            }
        }
    
        foreach (['+', '-'] as $operator) {
            while (($index = array_search($operator, $tokens)) !== false) {
                $left = $tokens[$index - 1];
                $right = $tokens[$index + 1];
    
                if ($operator === '+') {
                    $result = $left + $right;
                } else {
                    $result = $left - $right;
                }
    
                array_splice($tokens, $index - 1, 3, $result);
            }
        }
    
        return round($tokens[0], 2);
    }



}

?> 