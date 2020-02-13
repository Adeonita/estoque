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
            /**
             * Chamo o método estático do objeto produto e o método estático do objeto request
             * Cria um novo produto com todos os atributos descritos no seu model
             */
            Produto::create(Request::all()); 
            /**
             * Trago os dados da requisição anteririor e redireciono-os para o
             * Método lista() da classe controller idependendente da sua URI
             * Only se faz necessário para trazer apenas o parâmetro 'nome'
             * ps: Para trazer todos com execeção de algum use except('parametro')
             */
            return redirect()                           
                    ->action('ProdutoController@lista') 
                    ->withInput(Request::only('nome'));                                                                             
        }

        public function listaJson(){
            $produtos = Produto::all();
            return response()->json($produtos);
        }
    }

?>