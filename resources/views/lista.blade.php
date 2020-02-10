@extends('principal')

@section('conteudo')
    <h1>Listagem de produtos</h1>
    <table class="table table-striped table-bordered table-hover ">
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td>{{$produto->nome}} </td>
                <td>{{$produto->descricao}} </td>
                <td>{{$produto->quantidade}} </td>
                <td> <a href="/produtos/mostra/<?= $produto->id?>">Visualizar</a> </td>
            </tr>
        <?php endforeach ?>
    </table>
@stop
