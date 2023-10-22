@extends('app.layouts.basic')

@section('title','Product')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Product</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('product.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            @component('app.product._components.form_create_edit',['units' => $units,'suppliers' => $suppliers])
            @endcomponent
        </div>
    </div>
</div>
@endsection