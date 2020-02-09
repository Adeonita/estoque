<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;  //Livro
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();  //Livro
         $this->call('ProdutoTableSeeder');
    }
}

class ProdutoTableSeeder extends Seeder{
        
    /**
     * @return void
     */
    public function run(){
        DB::insert('insert into produtos (nome, quantidade, valor, descricao) 
                    values (?,?,?,?)' ,
                    array('Geladeira', 2, 100, 'Geladeira Duplex' ));

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) 
                    values (?,?,?,?)' ,
                    array('Fogão', 1, 699, 'Fogão x' ));

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) 
                    values (?,?,?,?)' ,
                    array('Microondas', 1, 169.00, 'Envia sms quando termina de esquentar' ));


    }

}
