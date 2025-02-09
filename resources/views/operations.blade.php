<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset(path: 'assets/images/favicon.png') }}" type="image/png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset(path: 'assets/bootstrap/bootstrap.min.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset(path: 'assets/css/main.css')}}">
</head>

<body>

    <!-- logo -->
    <div class="text-center my-3">
        <a href="{{route('home')}}"><img src="{{asset( path: 'assets/images/logo.jpg')}}" alt="logo" class="img-fluid" width="250px"></a>
    </div>

    <!-- operations -->
    <div class="container">

        <hr>

        <div class="row">

            @foreach ( $exercises as  $exercise )
            
             <!-- each operation -->

                @php
                    if($exercise[3] == '*'){
                        $exercise[3] = 'x';
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
                <a href="{{route('home')}}" class="btn btn-primary px-5">VOLTAR</a>
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