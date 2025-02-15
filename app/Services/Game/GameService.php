<?php

namespace App\Services\Game;

use Crypt;

class GameService{

    public static function gameConfig($questions, $answer, $wrongAnswer){
        session([
            'questions' => $questions,
            'answers' => $answer,
            'wrongAnswers' => $wrongAnswer,
            'questionIndex' => 0 ,// Começa da primeira pergunta
            'totalQuestions' => count($questions),
            'totalCorrect' => 0,
            'totalWrong' => 0,
        ]);
    }


    public static function compareAnswer($encAnswer){
        $answer = self::desencriptAnswer($encAnswer);

        $totalCorrect =   session('totalCorrect');
        $totalWrong =   session('totalWrong');
    
        if(self::getCurAnswer() == $answer){
            $totalCorrect += 1;
            session()->put(['totalCorrect' => $totalCorrect]);
            return true;
        }

        $totalWrong += 1;
        session()->put(['totalWrong' => $totalWrong]);
    }


    public static function feedbackAnswer($encAnswer){
        $curAnswer = self::getCurAnswer();

        if(self::compareAnswer($encAnswer)){
            return  $data = ['correct' => true,
                            'userAnswer' => self::desencriptAnswer($encAnswer),
                            'answer' => $curAnswer];
        }

        return  $data =  ['correct' => false,
                            'userAnswer' => self::desencriptAnswer($encAnswer),
                            'answer' => $curAnswer];
    }


    public static function desencriptAnswer($encAnswer){
        try{
            return Crypt::decryptString($encAnswer);
        }
        catch(\Exception $e){
            return redirect()->route('game');
        }
    }

    private static function getCurAnswer(){
        $answer = session('answers');
        $questionIndex = session('questionIndex');
        return $answer[$questionIndex];
    }

   
}


?>