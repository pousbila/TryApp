<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //le controller de la page dashbord !
    public function dashbord(){
        return view('home.dashbord');
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }
}
