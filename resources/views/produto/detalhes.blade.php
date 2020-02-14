@extends('layout/principal')

@section('conteudo')
    <h1>Detalhes do produto - {{$produto->nome}} </h1>

    <ul>
        <li><b>Nome: </b> 
            {{$produto->nome or 'Nenhum nome foi informado'}} <!--Maneira que um blade insere variaveis-->
        </li>
        <li><b>Descrição: </b> 
            {{$produto->descricao or 'Nenhuma descrição for informada'}}
        </li>
        <li><b>Quantidade: </b>
            {{$produto->quantidade or 0}}
        </li>
        <li><b>Valor R$: </b>
            {{$produto->valor or 0}}
        </li>
    </ul>
@stop

