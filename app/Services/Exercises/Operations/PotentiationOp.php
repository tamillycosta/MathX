<?php 

namespace App\Services\Exercises\Operations;


class PotentiationOp extends Potentiation{

    public function PotentiationMultiply($base){
        $potency = rand(10,999);
        $operator1 = $this->generateQuestion($base, $potency);
        $operator2 = $this->generateQuestion($base, $potency);
    }

}

?>