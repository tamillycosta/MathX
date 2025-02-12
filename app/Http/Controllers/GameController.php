<?php

namespace App\Http\Controllers;
use App\Services\Game\Factory\GameFactory;
use App\Http\Requests\LevelPostRequest;
use Illuminate\View\View;

class GameController extends Controller
{
    
    public function home(): View{
            return view(view: 'game.home');
    }

    private function setLevel(LevelPostRequest $request){
        $level = $request->level;
        $class = GameFactory::selectLevel($level);
        return $class;
    }

    public function gameLevel(LevelPostRequest $request){

        $class = $this->setLevel($request);

        $questions = $class->setGameLevel(5);
        $answer =  $class->getAnswer($questions);
        $whrongAnswer = $class->getWrongAnswer($questions);

       $data = [
        'questions' => $questions,
        'answer' => $answer,
        'whrongAnswer' => $whrongAnswer
       ];
    
       
       print_r($whrongAnswer);
        //return view('game.game', ['data' => $data]);
    }


    
}
