<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;
use estoque\Http\Models\User;
use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;
use JWTAuth;
use Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->only('email', 'password' ); //pega o email e senha da requisição
        $user = User::where('email', $credentials['email'])->first(); //procura pela primeira ocorrência deste email

        if(!$user){  //Se não existir retorna 404 error
            return response()
                        ->json(['message' => 'Invalid credentials'])
                        ->setStatusCode(404);
        }

        if(!Hash::check($credentials['password'], $user->password)){ //Checa se a senha passada é a mesma que está no  banco caso nao seja retorna erro 404
            return response()
                        ->json(['message' => 'Invalid credentials'])
                        ->setStatusCode(404);
        }

        $token = JWTAuth::fromUser($user);  //Generate Token
        $objectToken = JWTAuth::setToken($token); //Get expiration time
        $expiration = JWTAuth::decode(($objectToken->getToken()))->get('exp');

        return response()->json([
            'acess_token' => $token,
            'token_type' => 'Bearer',
            'expires_ins' => $expiration

        ]);
    
    }
}
