<?php
    namespace estoque\Http\Controllers;

    use estoque\Http\Models\Produto;
    use Request;
    use estoque\Http\Requests\ProdutoRequest;

    class ProdutoController extends Controller {

        public function __contruct(){
            //$this->middleware('jwt.auth')->only('delete');
        }

        /**
         * Retorna uma lista de produtos
         * @return json - Lista de produtos
         */
        public function index(){
            $products = Produto::all(); 
            if(!$products){
                return response()
                        ->json([
                            'error' => 'Record not found',
                            'result' => false,
                            'data' => []
                        ])
                        ->setStatusCode(204);
            }
            return response()
                    ->json([
                        'error' => 'Record not found',
                        'result' => true,
                        'data' => $products
                    ])
                    ->setStatusCode(200);
        }

        /**
         * Insere o produto no banco
         * @param ProdutoRequest
         * @return 
         */
        public function store(ProdutoRequest $request){
            $product = Produto::create($request->all()); 
            if(!$product){
                return response()
                        ->json([
                            'error' => 'Record not create',
                            'result' => 'false',
                            'data' => []
                        ])
                        ->setStatusCode();
            }
            $response = response()
                        ->json([
                            'error' => false,
                            'result' => true,
                            'data' => $product
                        ])
                        ->setStatusCode(201);
                        
            return $response;            
        }
        
        /**
         * Insere o produto no banco
         * @param id
         * @return response
         */

        public function update($id){
            $product = Produto::find($id);  
            if(!$product){
                return response()
                        ->json([
                                'error' => 'Record not found',
                                'result' => false,
                                'data' => []
                            ])
                        ->setstatusCode(404);
            }
            $product->nome = Request::input('nome');
            $product->descricao = Request::input('descricao');
            $product->quantidade = Request::input('quantidade');
            $product->valor = Request::input('valor');         
            $product->save();
            $response = response()
                        ->json([
                            'error' => false,
                            'result' => true,
                            'data' => $product
                        ])
                        ->setStatusCode(200);

            return $response;
        }

        /**
         * Função que remove produto{id}
         * @param id:integer - Id do produto
         * @return response:string
         **/
        public function delete($id){
            $product = Produto::find($id);  
            if(!$product){
                return response()
                        ->json([
                            'error' => 'Record not found',
                            'result' => false,
                            'data' => []
                        ])
                        ->setStatusCode(204);
            }
            $product = $product->delete();
            return response()
                    ->json([
                        'error' => false,
                        'result' => true,
                        'data' => $product
                    ])
                    ->setStatusCode(200);
        }


        /**
         * Mostra produto{id}
         * @param id:integer
         * @return response:json
         */
        public function show($id){
            $product = Produto::find($id);
            if(!$product){
                return response()
                        ->json([
                            'error' => 'Record not found',
                            'result' => false,
                            'data' => []
                        ])
                        ->setStatusCode(204);
            }
            $response = response()
                        ->json([
                            'error' => false,
                            'result' => true,
                            'data' => $product
                        ])
                        ->setStatusCode(200);
            return $response;
        }

        public function geraToken(){
            return csrf_token();
        }
    }

?>