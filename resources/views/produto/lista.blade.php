@extends('layout/principal')

@section('conteudo')

    @if(empty($produtos))  <!--Se o array de produtos devolvido pelo controller estiver vazio-->
        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado.
        </div>
    @else
        <h1>Listagem de produtos</h1>

        <table class="table table-striped table-bordered table-hover ">
            @foreach ($produtos as $produto)
                <tr class="{{$produto->quantidade <= 1 ? 'danger' : '' }}">
                    <td>{{$produto->nome}} </td>
                    <td>{{$produto->descricao}} </td>
                    <td>{{$produto->quantidade}} </td>
                    <td> <button type="button" href="{{action('ProdutoController@mostra', $produto->id)}}" class="btn btn-primary btn-sm">Visualizar</button>

                    <td>
                    <form method="post" action="{{action('ProdutoController@remove', $produto->id)}}">
                        <input type="hidden" name="_token" value="{{{csrf_token()}}}"/>
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <td>
                        <form method="get" action="{{action('ProdutoController@atualiza', $produto->id)}}">                         
                            <button type="submit" class="btn btn-warning btn-sm">Atualizar</button>
                        </form>                    
                    </td>
                    </td>
                    
                </tr>
            @endforeach
        </table>
    @endif
    <h4>
        <span class="label label-danger pull-right">
            Um ou menos itens no estoque
        </span>
    </h4>
    @if(old('nome'))
        <div class="alert alert-success" style="margin-top: 50px;">
            <strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado.
        </div>
    @endif
@stop
