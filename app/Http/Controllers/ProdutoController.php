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
            
            $html = '<h1> Listagem de produtos com Laravel</h1>';
            $html = $html . '<ul>';  //Crio uma lista não ordenada por concatenação
            //Chamo o método estatico( select() ) da classe DB e passo a query. Atribuo tudo isso a $produtos
            //$variavel = Classe::métodoEstatico('query)
            $produtos = DB::select('select * from produtos'); 

            foreach ($produtos as $p) {  //Percorro o array produtos atribuindo cada ítem individual a p
                $html .=  '<li>Nome: '. $p->nome . ' - Descrição: '. $p->descricao . '</li><br>';  //Acesso os atributos nome e descrição de cada produto. Concatenando da variavel html
            }
            $html = $html . '</ul>'; //Fecho a lista 
            
            return $html;  //A lista já é uma string, então não preciso do print, basta retorna-la
        }
    }

?>