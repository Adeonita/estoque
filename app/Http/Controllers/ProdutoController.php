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

            return view('lista', ['produtos' => $result]);
        }

        public function mostra(){

            $id = Request::input('id', '0');
            $result = DB::select("select * from produtos where id = $id");
            if(empty($result)){
                return "Produto não encontrado";
            }else{
                return view('detalhes', ['produto' => $result[0]]);
            }

        }
    }

?>