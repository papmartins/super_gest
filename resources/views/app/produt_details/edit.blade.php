@extends('app.layouts.basic')

@section('title','Detalhes do Product')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Editar Detalhes do Product</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('product_details.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{-- para ver lazy e eager loading --}}
        {{-- {{ $product_details->toJson()}}  --}}
        <h4>Product</h4>
        <div>Nome: {{$product_details->product->name}}</div>
        <br>
        <div>Descrição: {{$product_details->product->descricao}}</div>
        {{-- para ver lazy e eager loading --}}
        {{-- {{ $product_details->toJson()}}  --}}
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            @component('app.product_details._components.form_create_edit',['product_details' => $product_details,'units' => $units])
            @endcomponent
        </div>
    </div>
</div>
@endsection