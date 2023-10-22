@extends('app.layouts.basic')

@section('title','Order Product')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('order.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <h4>Detalhes do Pedido</h4>
        <p>ID do Pedido: {{ $order->id }}</p>
        <p>ID do Customer: {{ $order->customer_id }}</p>
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            <h4>Itens do Pedido</h4>
            <table border=1 style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do product</th>
                        <th>Quantidade</th>
                        <th>Data Criação</th>
                        <th></th>
                    </<tr>
                </thead>
                <tbody>
                {{-- {{$order->products}} --}}
                    @foreach ( $order->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantidade }}</td>
                            <td>{{ $product->pivot->created_at->format('d-m-Y') }}</td> {{-- ->withPivot('created_at') em App\Models\Order --}}
                            <td>
                                <form id="form_{{$product->pivot->id}}" method="post" 
                                    action="{{ route('product_order.destroy',['orderProduct' => $product->pivot->id, 'order_id' => $order->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$product->pivot->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </<tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{$order}} --}}
            @component('app.product_order._components.form_create',['order' => $order, 'products' => $products])
            @endcomponent
        </div>
    </div>
</div>
@endsection