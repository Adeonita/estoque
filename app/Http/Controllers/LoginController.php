<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        $credenciais = Request::only('email', 'password');

        if(){
            return "Usuario NOME logado com sucesso";
        }
        return "As credenciais não são validas";
    }    
}
