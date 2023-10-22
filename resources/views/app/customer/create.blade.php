@extends('app.layouts.basic')

@section('title','Customer')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Customer</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('customer.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            @component('app.customer._components.form_create_edit')
            @endcomponent
        </div>
    </div>
</div>
@endsection