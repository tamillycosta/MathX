<div class="row">
 

    @foreach ($options as  $option)

        <div class="col-6 text-center">
            <a href={{route('game.answer', Crypt::encryptString($option))}} class="text-decoration-none"> 
                <p class="response-option">{{$option}}</p>
            </a>
        </div>

    @endforeach

</div>
