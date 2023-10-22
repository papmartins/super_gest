@extends('app.layouts.basic')

@section('title','Customer')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de customers</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('customer.create') }}">Novo</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:90%;margin-left:auto;margin-right:auto;">
        {{-- para ver lazy e eager loading  --}}
        {{-- {{ $products->toJson()}}  --}}
            <table border=1 width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td><a href="{{ route('customer.show',$customer->id) }}">Visualizar</td>
                        <td>
                            <form method="post" id="form_{{$customer->id}}" action="{{ route('customer.destroy',$customer->id) }}">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit">Excluir</button> --}}
                                <a href="#" onclick="document.getElementById('form_{{$customer->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{ route('customer.edit',['customer' => $customer->id]) }}">Editar</a></td>
                    </tr>
            @endforeach 
                </tbody>
            </table>
            {{-- para ver lazy e eager loading  --}}
            {{-- {{ $products->toJson()}}  --}}
            {{ $customers->appends($request)->links() }}
            {{-- ->appends($request) evita que se percam as pesquisas quando se carrega nos links  --}}
            <br>
            Exibindo {{ $customers->count() }} do total de  {{ $customers->total() }} ({{ $customers->firstItem() }} - {{ $customers->lastItem() }})
        </div>
    </div>
</div>
@endsection