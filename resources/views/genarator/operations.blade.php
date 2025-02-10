@extends('layouts.mainLayout')

<body>

    <!-- logo -->
    <div class="text-center my-3">
        <a href="{{route('exercisesHome')}}"><img src="{{asset( path: 'assets/images/logo.jpg')}}" alt="logo" class="img-fluid" width="250px"></a>
    </div>

    <!-- operations -->
    <div class="container">

        <hr>

        <div class="row">

            @foreach ( $exercises as  $exercise )
            
             <!-- each operation -->

                
             @php
             for($i = 0; $i < strlen($exercise); $i++){
                 if($exercise[$i] == '*'){
                     $exercise[$i] = 'x';
                 }
             }
             @endphp

                    

             <div class="col-3 display-6 mb-3">
                <span class="badge bg-dark">{{ str_pad($loop->iteration, 2, '0' , STR_PAD_LEFT)}}</span>
                <span>{{$exercise}}</span>
            </div>

            @endforeach

          
        </div>

        <hr>

    </div>

    <!-- print version -->
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="{{route('exercisesHome')}}" class="btn btn-primary px-5">VOLTAR</a>
            </div>
            <div class="col text-end">
                <a href="{{route('export')}}" class="btn btn-secondary px-5">DESCARREGAR EXERCÍCIOS</a>
                <a href="{{route('print')}}" class="btn btn-secondary px-5">IMPRIMIR EXERCÍCIOS</a>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="text-center mt-5">
        <p class="text-secondary">MathX &copy; <span class="text-info">{{date('Y')}}</span></p>
    </footer>

    <!-- bootstrap -->
    <script src="assets/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>