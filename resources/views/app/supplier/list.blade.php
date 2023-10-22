@extends('app.layouts.basic')

@section('title','Supplier')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Supplier Listar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.supplier.add') }}">Novo</a></li>
            <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:90%;margin-left:auto;margin-right:auto;">
            <table border=1 width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>Uf</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->site}}</td>
                        <td>{{$supplier->uf}}</td>
                        <td>{{$supplier->email}}</td>
                        <td><a href="{{ route('app.supplier.delete',$supplier->id) }}"">Excluir</td>
                        <td><a href="{{ route('app.supplier.edit',$supplier->id) }}"">Editar</a></td>
                    </tr>
            @endforeach
                </tbody>
            </table>
            {{ $suppliers->appends($request)->links() }}
            {{-- ->appends($request) evita que se percam as pesquisas quando se carrega nos links  --}}
            <br>
            Exibindo {{ $suppliers->count() }} do total de  {{ $suppliers->total() }} ({{ $suppliers->firstItem() }} - {{ $suppliers->lastItem() }})
        </div>
    </div>
</div>
@endsection