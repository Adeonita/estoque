<?php

namespace estoque\Http\Controllers;

//use Illuminate\Http\Request;
use estoque\Http\Models\User;
use estoque\Http\Requests\UserRequest;
use Request;

class UsuarioController extends Controller
{
    /**
         * Exibe todos os usuarios
         * @return 
         */
    public function index(){
        $users = User::all();
        if(!$user){
            return response()
                    ->json([
                        'error' => 'Record not found',
                        'result' => false,
                        'data' => []
                    ]);
        }

        $response = response()
                    ->json([
                        'error' => false,
                        'result' => true,
                        'data' => $users])
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
                    ->json([
                        'error' => false,
                        'result' => true,
                        'data' => $user
                        ])
                    ->setStatusCode(201);
        
        return $response;
    }

    /**
     * Atualiza usuario{id} no banco
     * @param 
     * @return 
     */
    public function update( $id){
        $user = User::find($id);
        if(!$user){
            return response()
                ->json([
                    'error' => 'Record not found',
                    'result' => false,
                    'data' => []
                    ])
                ->setStatusCode(204); //nenhum conteudo encontrado
        }
        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->password = bcrypt(Request::input('password'));  
        $user->save();
        $response = response()
                    ->json([
                        'error' => false,
                        'result' => true,
                        'data' => $user
                        ])
                    ->setStatusCode(200);
        return $response;
    }

    /**
     * Deleta usuario{id}
     * @param 
     * @return 
     */
    public function delete($id){
        $user = User::find($id);
        if(!$user){
            return response()
                    ->json([
                        'error' => 'Record not found',
                        'result' => false,
                        'data' => []
                        ])
                    ->setStatusCode(204);
        }
        $user = $user->delete();
        return response()
                    ->json([
                        'error' => false,
                        'result' => true,
                        'data' => []
                    ])
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
                    ->json([
                            'erro' => 'Record not found', 
                            'result'=>false, 
                            'data'=>[]
                        ])
                    ->setStatusCode(204);
        }
        $response = response()
                    ->json([
                            'erro'=>false, 
                            'result'=>true, 
                            'data' => $user
                        ])
                    ->setStatusCode(200);
        return $response;
    }
}
