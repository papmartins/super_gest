@extends('app.layouts.basic')

@section('title','Supplier')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Supplier</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.supplier.add') }}">Novo</a></li>
            <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            <form method="post" action="{{ route('app.supplier.listFiltered') }}">
                @csrf
                <input type="text" name="name" placeholder="Nome" class="borda-preta">
                <input type="text" name="site" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" placeholder="UF" class="borda-preta">
                <input type="text" name="email" placeholder="Email" class="borda-preta">
                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
@endsection