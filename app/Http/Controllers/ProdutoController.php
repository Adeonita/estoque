<?php
    namespace estoque\Http\Controllers;
    use Illuminate\Support\Facades\DB;

    class ProdutoController extends Controller {

        /**
         * Função que cria uma lista com os dados do banco 
         * por meio de concatenação passa no array retornado pela query select e exibe cada um dos itens
         * @return $html : String que concatenada criará uma lista html não ordenada
         ***/
        public function lista(){
            
            $produtos = DB::select('select * from produtos'); 

            return view('lista', ['produtos' => $produtos]);
        }

        public function mostra(){
            $produtos = DB::select('select * from produtos');

            return view('detalhes', ['produtos' => $produtos]);
        }
    }

?>