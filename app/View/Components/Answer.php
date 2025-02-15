<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Answer extends Component
{
    /**
     * Create a new component instance.
     */
    public string $userAnswer;
    public string $answer;

    public function __construct($userAnswer, $answer)
    {
        $this->userAnswer = $userAnswer;
        $this->answer = $answer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answer');
    }
}
