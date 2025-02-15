<?php

namespace App\Http\Controllers;
use App\Services\Game\Factory\GameFactory;
use App\Http\Requests\LevelPostRequest;
use App\Services\Game\GameService;
use Illuminate\View\View;

class GameController extends Controller
{
    
    public function home(): View{
            return view(view: 'game.home');
    }

    private function setLevel(LevelPostRequest $request): object{
        $level = $request->level;
        $class = GameFactory::selectLevel($level);
        return $class;
    }


    public function gameLevel(LevelPostRequest $request){
        $class = $this->setLevel($request);
        $questions = $class->setGameLevel(5);
        $answer =  $class->getAnswer($questions);
        $wrongAnswer = $class->getWrongAnswer($questions);
        GameService::gameConfig($questions, $answer, $wrongAnswer);
     
        return redirect()->route('game.question');
    }

    public function gameLoop(){
        $questions = session('questions', []);
        $index = session('questionIndex', 0);
        
        if ($index >= count($questions)) {
            return redirect()->route('game.end'); // Redireciona ao final
        }

       return $this->showQuestion();
    }

    public function showQuestion(){

        $questions = session('questions', []);
        $answers = session('answers', []);
        $wrongAnswers = session('wrongAnswers', []);

        $index = session('questionIndex', 0);
        $totalQuestions = session('totalQuestions', 0);


        $question = $questions[$index];
        $correctAnswer = $answers[$index];
        $incorrectAnswers = $wrongAnswers[$index];

        $options = $incorrectAnswers;
        $options[] = $correctAnswer;
        shuffle($options);

        return view('game.game', compact('question', 'options', 'index', 'totalQuestions'));
        }


        public function nextQuestion() {
            $index = session('questionIndex', 0) + 1;
            session(['questionIndex' => $index]);
        
            return redirect()->route('game.question');
        }


        function getAnswer($answer){
            $questions = session('questions', []);
            $index = session('questionIndex', 0);
            $totalQuestions = session('totalQuestions', 0);
            $question = $questions[$index];

            $data = GameService::feedbackAnswer($answer);
            
            return view('game.feedback', compact('data', 'question', 'index', 'totalQuestions' ));
            
        }

    
        function gameEnd(){

        }
}
