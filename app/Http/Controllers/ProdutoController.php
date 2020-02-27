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
            $result = Produto::all(); 
            return response()
                    ->json($result)
                    ->setStatusCode(200);
        }

        /**
         * Insere o produto no banco
         * @param ProdutoRequest
         * @return 
         */
        public function store(ProdutoRequest $request){
            $result = Produto::create($request->all()); 
            $response = response()
                        ->json($result)
                        ->setStatusCode(201);
                        
            return $response;            
        }
        
        /**
         * Insere o produto no banco
         * @param id
         * @return response
         */

        public function update($id){
            $produto = Produto::find($id);  
            if(!$produto){
                return response()
                        ->json(['message' => 'Record not found',])
                        ->setstatusCode(404);
            }
            $produto->nome = Request::input('nome');
            $produto->descricao = Request::input('descricao');
            $produto->quantidade = Request::input('quantidade');
            $produto->valor = Request::input('valor');         
            $produto->save();
            $response = response()
                        ->json($produto)
                        ->setStatusCode(200);

            return $response;
        }

        /**
         * Função que remove produto{id}
         * @param id:integer - Id do produto
         * @return response:string
         **/
        public function delete($id){
            $result = Produto::find($id);    
            $result = $result->delete();
            return response()->json($result);
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
                        ->json(['message' => 'Record not found',])
                        ->setStatusCode(404);
            }
            $response = response()
                        ->json($product)
                        ->setStatusCode(200);
            return $response;
        }

        public function geraToken(){
            return csrf_token();
        }
    }

?>