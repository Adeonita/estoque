<?php
    namespace estoque\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use Request;

    class ProdutoController extends Controller {

        /**
         * Função que cria uma lista com os dados do banco 
         * por meio de concatenação passa no array retornado pela query select e exibe cada um dos itens
         * @return $html : String que concatenada criará uma lista html não ordenada
         ***/
        public function lista(){
            
            $result = DB::select('select * from produtos'); 

            return view('produto/lista', ['produtos' => $result]);
        }

        public function mostra($id){ //O id sendo passado como parâmetro na chamada do método, fazendo-se desnecessário o uso da classe Request::route('id')

            $result = DB::select("select * from produtos where id = $id");
            if(empty($result)){
                return "Produto não encontrado";
            }else{
                return view('produto/detalhes', ['produto' => $result[0]]);
            }
        }

        public function novo(){
            return view('produto/formulario');
        }
    }

?>