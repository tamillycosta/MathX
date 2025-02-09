<?php
namespace App\Services\Factorys;


use App\Services\Operations\Subtracion;
use App\Services\Operations\Sum;
use App\Services\Operations\Division;
use App\Services\Operations\Multiplication;

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