<?php
    namespace estoque\Http\Models;
    
    use Illuminate\Database\Eloquent\Model;

    class Produto extends Model{
        
        protected $table = 'produtos';
        public $timestamps = false;
        protected $fillable = array('nome', 'descricao', 'quantidade', 'valor');  /**Especificação de quais parâmetros devem vir
                                                                                    * no corpo da requisição
                                                                                    **/
        protected $guarded = ['id']; /**Especificação de quais parametros não devem ser inseridos na requisição*/
    }
?>