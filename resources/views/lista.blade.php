@extends('principal')

<h1>Listagem de produtos</h1>
<table class="table table-striped table-bordered table-hover ">
    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?  print $produto->nome; ?> </td>
            <td><?  print $produto->descricao; ?> </td>
            <td><?  print $produto->quantidade; ?> </td>
            <td> <a href="/produtos/mostra/<?= $produto->id?>">Visualizar</a> </td>
        </tr>
    <?php endforeach ?>
</table>
