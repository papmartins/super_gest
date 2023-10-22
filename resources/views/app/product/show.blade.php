@extends('app.layouts.basic')

@section('title','Product')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Visualizar Product</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('product.index') }}">Voltar</a></li>
            <li><a href="{{ route('product.edit',$product->id) }}">Editar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            <table border="1" style="text-align:left">
                <tr>
                    <td>ID:</td>
                    <td>{{$product->id}}</td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>{{$product->descricao}}</td>
                </tr>
                <tr>
                    <td>Peso:</td>
                    <td>{{$product->peso}}</td>
                </tr>
                <tr>
                    <td>Unit de Medida:</td>
                    <td>{{$product->unit_id}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection