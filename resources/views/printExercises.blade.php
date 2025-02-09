<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
  
        <h1>Exercicos de Matemática {{env('APP_NAME')}} </h1>
       <!-- operations -->
    <div class="container">

        <hr>

        <div class="row">

            @foreach ( session('exercises') as  $exercise )

                @php
                for($i = 0; $i < strlen($exercise); $i++){
                    if($exercise[$i] == '*'){
                        $exercise[$i] = 'x';
                    }
                }
                @endphp

            
             <!-- each operation -->
             <div class="row-3 display-6 mb-3">
                <h2>{{str_pad($loop->iteration, 2, '0' , STR_PAD_LEFT)}} -  {{$exercise}}</h2>
                
            </div>

            @endforeach

        </div>

        <hr>

    </div>

    <h1>Respostas: </h1>

    @foreach ( session('answers') as $answer)
    <div class="row-3 display-6 mb-3">
        <h2>{{str_pad($loop->iteration, 2, '0' , STR_PAD_LEFT)}} =  {{$answer}}</h2>
        
    </div>

    @endforeach
</body>
</html>
