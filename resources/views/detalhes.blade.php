@extends('principal')

@section('conteudo')
    <h1>Detalhes do produto <?= $produto->nome?></h1>

    <ul>
        <li><b>Nome: </b><?print $produto->nome; ?></li>
        <li><b>Descrição: </b><?print $produto->descricao; ?></li>
        <li><b>Quantidade: </b><?print $produto->quantidade; ?></li>
        <li><b>Valor: </b><?print $produto->valor; ?></li>
    </ul>
@stop

