<?php 

namespace App\Services\Exercises\Operations;


class PotentiationOp extends Potentiation{

    private function PotentiationOperands($base, $numOperands){
        $operands = [];
        $potency = rand(10,999);
        for($i = 0; $i < $numOperands; $i++ ){
            $operands =  $this->generateQuestion($base, $potency);
        }
        return  $operands;
    }

    public function PotentiationMultiply($base, $numOperands): string{
        $operands = $this->PotentiationOperands($base, $numOperands);
        return implode('*', $operands);  
    }


    public function PotentiationDivision($base, $numOperands): string{
        $operands = $this->PotentiationOperands($base, $numOperands);
        return implode('/', $operands);  
    }
}

?>