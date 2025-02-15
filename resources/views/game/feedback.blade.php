@extends('game.layout.mainLayout')

<body>
      <!-- main logo -->
@include('layouts.topBar')


    <div class="container">

        <div class="container">
            <x-question :indexQuestion="$index" :curQuestion="$question"  :totalQuestions="$totalQuestions"/>
            <x-answer :answer="$data['answer']"  :userAnswer="$data['userAnswer']"/> 
        </div>

        
    </div>

    <!-- avançar game -->
    <div class="text-center mt-5">
        <a href={{route('game.next')}} class="btn btn-primary mt-3 px-5">AVANÇAR</a>
    </div>

    @include('layouts.footer')
</body>
</html>
