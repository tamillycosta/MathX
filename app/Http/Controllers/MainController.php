<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;   
use Illuminate\Http\Response;

class MainController extends Controller
{

    public function home():View{
    // apresentar  a home
    return view('home');
    }


    public function exercisesHome(): View{
        return view('genarator.home');
    }


    public function gameHome(){
        return view('game.home');
    }


}
