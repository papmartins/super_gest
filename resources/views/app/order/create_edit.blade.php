@extends('app.layouts.basic')

@section('title','Order')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Order</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('order.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            @component('app.order._components.form_create_edit',['customers' => $customers])
            @endcomponent
        </div>
    </div>
</div>
@endsection