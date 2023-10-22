@extends('app.layouts.basic')

@section('title','Detalhes do Product')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Detalhe do Product</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('product_details.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            @component('app.product_details._components.form_create_edit',['units' => $units])
            @endcomponent
        </div>
    </div>
</div>
@endsection