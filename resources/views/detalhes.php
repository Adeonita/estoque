<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <title>Descrição dos produtos</title>
    </head>
    <body>
        <div class="container">
          <h1>Detalhe dos produtos</h1>
          <table class="table table-striped table-bordred table-hover">
          <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
          </tr>
            <?php foreach($produtos as $produto): ?>
            <tr>
                <td><?print $produto->nome; ?></td>
                <td><?print $produto->descricao; ?></td>
                <td><?print $produto->quantidade; ?></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
    </body>
</html>
