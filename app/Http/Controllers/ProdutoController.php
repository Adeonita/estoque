<?php
    namespace estoque\Http\Controllers;

    use estoque\Http\Models\Produto;
    use Request;
    use estoque\Http\Requests\ProdutoRequest;

    class ProdutoController extends Controller {

        /**
         * Retorna uma lista de produtos
         * @return: 
         */
        public function index(){
            $result = Produto::all(); 
            return response()->json($result);
        }
        
        /**
         * Mostra um produto
         * @param: id
         * @return 
         */
        public function show($id){
            $result = Produto::find($id);
            $response = response()->json($result);
            return $response;
        }

        /**
         * Insere no banco
         * @param: 
         * @return: 
         */
        public function store(ProdutoRequest $request){
            $result = Produto::create($request->all()); 
            $response = response()->json($result);
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

        public function atualiza($id){
            $result = Produto::find($id);  

            if(empty($result)){
                return "Produto inexistente";
            }else{
                return view('/produto/formularioAtualiza', ['produto' => $result]); //O formulário precisa do id
            }            
        }

        public function update($id){
            $result = Produto::find($id);            
            $result->nome = Request::input('nome');
            $result->descricao = Request::input('descricao');
            $result->quantidade = Request::input('quantidade');
            $result->valor = Request::input('valor');         
            $result->save();
            $response = response()->json($result);

            return $response;
        }


        public function geraToken(){
            return csrf_token();
        }
    }

?>