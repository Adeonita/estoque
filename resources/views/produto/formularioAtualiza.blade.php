@extends('layout/principal')

@section('conteudo')
    <h1>Atualização do Produto - {{$produto->nome}}</h1>
    <form action="/produtos/atualizado/{{$produto->id}}" method="post">
    <input type="hidden" name="_token" value="{{{csrf_token()}}}"/>
    {{method_field('PUT')}}

        <!---->
        
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{$produto->nome}}">
        </div>
        <div class="form-group">
            <label>Descricao</label>
            <input name="descricao" class="form-control" value="{{$produto->descricao}}">
        </div>
            <div class="form-group">
            <label>Valor</label>
            <input name="valor" class="form-control" value="{{$produto->valor}}">
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" type="number" class="form-control" value="{{$produto->quantidade}}">
        </div>
        <button type="submit" class="btn
        btn-primary btn-block">Submit</button>
    </form>
@stop
