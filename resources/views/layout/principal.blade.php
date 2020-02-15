<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="/css/app.css">
        <title>Controle de Estoque</title>
    </head>
    <body>
        <div  class="container">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{action('ProdutoController@lista')}}">Listagem</a></li>
            <li><a href="{{action('ProdutoController@novo')}}">Novo</a></li>
        </ul>
            @yield('conteudo')
        </div>
    </body>
</html>