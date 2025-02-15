@include('game.layout.mainLayout')


<body>
  <!-- main logo -->
@include('layouts.topBar')

<div class="container">

    <x-question :indexQuestion="$index" :curQuestion="$question"  :totalQuestions="$totalQuestions"/>
    
    <x-options :options="$options"/>
    
    
</div>

<!-- cancel game -->
<div class="text-center mt-5">
    <a href="#" class="btn btn-outline-danger mt-3 px-5">CANCELAR JOGO</a>
</div>

@include('layouts.footer')

<script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
    
</body>
</html>