@extends('layouts.mainLayout')

<body>
    
@include('layouts.topBar')

    <h3 class="text-center text-secondary mb-5">
        Selecione como deseja estudar<br>
    </h3>

    <div class="container border border-primary rounded-3 p-5">
        <div class="d-flex justify-content-center gap-5 heigth-30">

            <div class="text-end">
                <a href="{{route('exercisesHome')}}" class="btn btn-primary btn-lg py-3">Gerar exercícios</a>
            </div>

            <div class="text-end">
                <a href="{{route('game')}}" class="btn btn-primary btn-lg py-3">Praticar com um game</a>
            </div>

         </div>
    </div>
    @include('layouts.footer')
</body>
