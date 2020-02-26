<?php
    namespace estoque\Http\Controllers;

    use estoque\Http\Models\Produto;
    use Request;
    use estoque\Http\Requests\ProdutoRequest;

    class ProdutoController extends Controller {

        /**
         * Retorna uma lista de produtos
         * @return: json - Lista de produtos
         */
        public function index(){
            $result = Produto::all(); 
            return response()
                    ->json($result)
                    ->setStatusCode(200);
        }
        
        /**
         * Mostra um produto
         * @param: id
         * @return 
         */
        public function show($id){
            $product = Produto::find($id);
            if(!$product){
                return response()
                        ->json(['message' => 'Record not found'],)
                        ->setStatuscode(404);
            }
            $response = response()
                        ->json($product)
                        ->setStatusCode(200);
            return $response;
        }

        /**
         * Insere o produto no banco
         * @param: 
         * @return: 
         */
        public function store(ProdutoRequest $request){
            $result = Produto::create($request->all()); 
            $response = response()
                        ->json($result)
                        ->setStatusCode(201);
            return $response;            
        }

        /**
         * Função que remove um produto
         * @param: id - Id do produto
         * @return:  
         **/
        public function delete($id){
            $result = Produto::find($id);         
            return "$result->delete()";
        }

        public function update($id){
            $produto = Produto::find($id);  
            if(!$produto){
                return response()
                        ->json(['message' => 'Record not found'],)
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


        public function geraToken(){
            return csrf_token();
        }
    }

?>