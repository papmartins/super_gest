@extends('app.layouts.basic')

@section('title','Order')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Pedidos</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('order.create') }}">Novo</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width:90%;margin-left:auto;margin-right:auto;">
        {{-- para ver lazy e eager loading  --}}
        {{-- {{ $products->toJson()}}  --}}
            <table border=1 width="100%">
                <thead>
                    <tr>
                        <th>ID Order</th>
                        <th>Customer</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->customer_id}}</td>
                        <td><a href="{{ route('product_order.create',['order' => $order->id]) }}">Adicionar Produtos</td>
                        <td><a href="{{ route('order.show',$order->id) }}">Visualizar</td>
                        <td>
                            <form method="post" id="form_{{$order->id}}" action="{{ route('order.destroy',$order->id) }}">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit">Excluir</button> --}}
                                <a href="#" onclick="document.getElementById('form_{{$order->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{ route('order.edit',['order' => $order->id]) }}">Editar</a></td>
                    </tr>
            @endforeach 
                </tbody>
            </table>
            {{-- para ver lazy e eager loading  --}}
            {{-- {{ $products->toJson()}}  --}}
            {{ $orders->appends($request)->links() }}
            {{-- ->appends($request) evita que se percam as pesquisas quando se carrega nos links  --}}
            <br>
            Exibindo {{ $orders->count() }} do total de  {{ $orders->total() }} ({{ $orders->firstItem() }} - {{ $orders->lastItem() }})
        </div>
    </div>
</div>
@endsection