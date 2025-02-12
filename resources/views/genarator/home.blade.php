@extends('layouts.mainLayout')

<body>
    <!-- logo -->
    <div class="text-center my-3">
        <img src="{{asset( path: 'assets/images/logo.jpg')}}" alt="logo" class="img-fluid">
    </div>

    <h3 class="text-center text-secondary mb-5">
        Selecione como deseja estudar<br>
    </h3>

    

    <!-- form -->
    <form action="{{route(name: 'genarete')}}" method="post">
        @csrf

        <div class="container border border-primary rounded-3 p-5">

            <div class="row gap-5">

                <!-- 4 checkboxes -->
                <div class="col">

                    <p class="text-info">Operações:</p>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="check_sum"  name="operations[]" value="Sum" checked>
                        <label class="form-check-label" for="check_sum">Soma</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="check_subtraction" name="operations[]" value="Subtraction"
                            checked>
                        <label class="form-check-label" for="check_subtraction">Subtração</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="check_multiplication"
                            name="operations[]" value="Multiplication" checked>
                        <label class="form-check-label" for="check_multiplication">Multiplicação</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check_division" name="operations[]" 
                        value="Division" checked >
                        <label class="form-check-label" for="check_division">Divisão</label>
                    </div>

                </div>

 
                <div class="col">
                <p class="text-info">Operadores:</p>

                <div class="mb-3">
                    <label for="operators">Quantidade:</label>
                    <input type="number" class="form-control" id="number_one" name="operators" min="2" max="999"
                        value="2">
                </div>
            </div>



                <!-- parcelas -->
                <div class="col">

                    <p class="text-info">Valor das Parcelas:</p>

                    <div class="mb-3">
                        <label for="number_one">Mínimo:</label>
                        <input type="number" class="form-control" id="number_one" name="number_one" min="0" max="999"
                            value="0">
                    </div>

                    <div>
                        <label for="number_two">Máximo:</label>
                        <input type="number" class="form-control" id="number_two" name="number_two" min="0" max="999"
                            value="100">
                    </div>

                     <!-- Numero de operadores -->
               


                </div>
      

                <!-- number of exercises and submit -->
                <div class="col">

                    <p class="text-info">Número de exercícios:</p>

                    <div class="mb-3">
                        <label for="number_exercises">Número:</label>
                        <input type="number" class="form-control" id="number_exercises" name="number_exercises" min="5"
                            max="50" value="10">
                    </div>
                    
                        <div class="container mt-5">
                            <div class="d-flex justify-content-center gap-5 flex-direction-col">
                                <div class="col">
                                    <a href="{{route('home')}}" class="btn btn-primary px-5">VOLTAR</a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary  px-5">Gerar exercícios</button>
                                </div>
                            </div>
                        </div>
                    
                </div>
                @if($errors->any())
                    <div class="container">
                        <div class="row">
                            <div class="alert alert-danger text-center mt-3">
                                Por favor selecione pelo menos uma operação. As parcelas devem variar de 0 a 99. o numero de exercicios varia de 5 a 50
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>

    </form>

   @include('layouts.footer')
</body>

</html>