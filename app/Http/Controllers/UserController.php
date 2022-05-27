<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        
    }

    public function register(){
        return view('users.register');
    }

    public function store(Request $request){
        
    }

    public function logout(){
        
    }
}
