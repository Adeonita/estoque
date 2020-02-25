<?php

namespace estoque\Http\Controllers;

use Request;
use Auth;

class LoginController extends Controller
{
    public function login(){
        $credenciais = Request::only('email', 'password');

        if(Auth::attempt($credenciais)){
            return "Usuário ".ucfirst( Auth::user()->name)." logado com sucesso";
        }
        return "As credenciais não são validas";
    }    
}
