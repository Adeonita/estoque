<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;
use estoque\Http\Models\User;
use estoque\Http\Requests\UserRequest;

class UsuarioController extends Controller
{
    /**
         * Exibe todos os usuarios
         * @return 
         */
    public function index(){
        $users = User::all();
        $response = response()
                    ->json($users)
                    ->setStatusCode(200);

        return $response;
    }

    /**
    * Insere um usuário no banco
    * @param UserRequest
    * @return Response
     */
    public function store(UserRequest $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $response = response()
                    ->json($user)
                    ->setStatusCode(201);
        
        return $response;
    }

    /**
     * Atualiza usuario{id} no banco
     * @param 
     * @return 
     */
    public function update($id){
        $user = User::find($id);
        if(!$user){
            return response()
                ->json(['message' => 'Record not found'])
                ->setStatusCode(404);
        }
        $user->nome = Request::input('nome');
        $user->email = Request::input('email');
        $user->senha = bcrypt(Request::input('senha'));  
        $user->save();
        $response = response()
                    ->json($user)
                    ->setStatusCode(200);
    }

    /**
     * Deleta usuario{id}
     * @param 
     * @return 
     */
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        $response = response()
                    ->setStatusCode(200);
    }

    /**
     * Mostra usuario{id}
     * @param 
     * @return 
     */
    public function show($id){
        $user = User::find($id);
        if(!$user){
            return response()
                    ->json(['message' => 'Record not found'])
                    ->setStatusCode(404);
        }
        $response = response()
                    ->json($user)
                    ->setStatusCode(200);
        return $response;
    }
}
