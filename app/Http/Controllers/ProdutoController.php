<?php
    namespace estoque\Http\Controllers;

    use estoque\Http\Models\Produto;
    use Request;

    class ProdutoController extends Controller {

        /**
         * Função que cria uma lista com os dados do banco 
         * por meio de concatenação passa no array retornado pela query select e exibe cada um dos itens
         * @return $html : String que concatenada criará uma lista html não ordenada
         ***/
        public function lista(){
            
            $result = Produto::all(); 

            return view('produto/lista', ['produtos' => $result]);
        }

        public function mostra($id){ //O id sendo passado como parâmetro na chamada do método, fazendo-se desnecessário o uso da classe Request::route('id')

            $result = Produto::find($id);            
            if(empty($result)){
                return "Produto inexistente";
            }else{
                return view('produto/detalhes', ['produto' => $result]);
            }
        }

        public function novo(){
            return view('produto/formulario');
        }

        /**
         * Retorna um array com os valores inseridos no formulário separados por ','
         * @param: 
         * @return: array
         */
        public function adiciona(){
            $params = Request::all(); //Pego todos os parâmetros que vieram na requisição
            $produto = new Produto($params); /**Para utilizar dessa maneira utilize a propriedadeprotected $field no model 
                                               do objeto para especificar quais parâmetros devem ser populados pelo usuario **/
            $produto->save(); //Insere o produto no banco de dados

            return redirect()                           //Trazendo os dados da requisição anteririor  redirecioinando para
                    ->action('ProdutoController@lista') // Método lista da classe controller idependendente da sua URI
                    ->withInput(Request::only('nome')); // Trazendo apenas o parâmetro 'nome'
                                                        // Para trazer todos com execeção de algum use except('parametro')
                                                                            
        }

        public function listaJson(){
            $produtos = Produto::all();
            return response()->json($produtos);
        }
    }

?>