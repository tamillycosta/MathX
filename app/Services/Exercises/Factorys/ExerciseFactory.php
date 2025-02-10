<?php
namespace App\Services\Exercises\Factorys;


use App\Services\Exercises\Operations\Subtracion;
use App\Services\Exercises\Operations\Sum;
use App\Services\Exercises\Operations\Division;
use App\Services\Exercises\Operations\Multiplication;

class ExerciseFactory{

    public static function genareteExercise($type){    
        
        $operatrions = [
            "Sum" => Sum::class,
            "Subtraction" => Subtracion::class,
            "Multiplication" => Multiplication::class,
            "Division" =>  Division::class
        ];

        if(!array_key_exists($type, $operatrions)){
            throw new \InvalidArgumentException("Operação inválida: $type");
        }
       
        $className = $operatrions[$type];
        return new $className();
    }   
}

?>