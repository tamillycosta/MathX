@extends('layouts.mainLayout')

<body>

@include('layouts.topBar')

<!-- form -->
<div class="container border border-primary rounded-3 p-5">
    <div class="row gap-5 justify-content-center">
        <div class="col-4 text-center">
            <label class="form-label display-6 mb-10" for="total_questions">Escolha seu nivel:</label>

            <form action="{{route(name: 'setLevel')}}" method="post">   
                @csrf
            <div class="d-flex justify-content-center mb-5 mt-3">
                
                <div class="btn-group" role="group" aria-label="Níveis">
                    <input type="radio" class="btn-check" name="level" id="easy" value="easy" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="easy">Fácil</label>
                  
                    <input type="radio" class="btn-check" name="level" id="medium" value="medium" autocomplete="off">
                    <label class="btn btn-outline-primary" for="medium">Médio</label>
                  
                    <input type="radio" class="btn-check" name="level" id="hard" value="hard" autocomplete="off">
                    <label class="btn btn-outline-primary" for="hard">Difícil</label>
                  </div>  

                  @error('level')
                <div class="text-danger">{{$message}}</div>
                    @enderror()
            </div>
         

        <div class="text-center">
            <button class="btn btn-primary px-5" type="submit">INICIAR QUESTIONÁRIO</button>
        </div>
        
            </form>
        </div>
    </div>
</div>        

@include('layouts.footer')

</body>