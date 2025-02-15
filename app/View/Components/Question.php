<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Question extends Component
{
    /**
     * Create a new component instance.
     */
    public string $curQuestion;
    public int $indexQuestion;
    public int $totalQuestions;

    public function __construct(int $totalQuestions, int $indexQuestion,String $curQuestion)
    {
     $this->totalQuestions = $totalQuestions;
     $this->indexQuestion = $indexQuestion;
     $this->curQuestion = $curQuestion;
     
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question');
    }
}
