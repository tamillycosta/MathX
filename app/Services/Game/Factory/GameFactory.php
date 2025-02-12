<?php
namespace App\Services\Game\Factory;

use App\Services\Game\Levels\Easy;
use App\Services\Game\Levels\Hard;
use App\Services\Game\Levels\Medium;

class GameFactory{

   public static function selectLevel($type): object{

    $levels = ['easy' => Easy::class, 'medium' => Medium::class, 'hard' => Hard::class];

    if(!array_key_exists($type, $levels)){
        throw new \InvalidArgumentException('opção invalida');
    }
        $class = $levels[$type];
        return new $class;
   }

}


?>