@extends('app.layouts.basic')

@section('title','Supplier')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Supplier Adicionar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.supplier.add') }}">Novo</a></li>
            <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            {{ $msg ?? '' }}
            <form method="post" action="{{ route('app.supplier.add') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $supplier->id ?? '' }}">
                <input type="text" value="{{ $supplier->name ?? old('name') }}" name="name" placeholder="Nome" class="borda-preta">
                {{ $errors->has('name') ? $errors->first('name') : '' }}
                <input type="text" value="{{ $supplier->site ?? old('site') }}" name="site" placeholder="Site" class="borda-preta">
                {{ $errors->has('site') ? $errors->first('site') : '' }}
                <input type="text" value="{{ $supplier->uf ?? old('uf') }}" name="uf" placeholder="UF" class="borda-preta">
                {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                <input type="text" value="{{ $supplier->email ?? old('email') }}" name="email" placeholder="Email" class="borda-preta">
                {{ $errors->has('email') ? $errors->first('email') : '' }}
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection