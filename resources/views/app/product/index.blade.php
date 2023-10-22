@extends('app.layouts.basic')

@section('title','Product')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de products</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('product.create') }}">Novo</a></li>
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
                        <th>Descrição</th>
                        <th>Supplier</th>
                        <th>Site Supplier</th>
                        <th>Peso</th>
                        <th>Unit ID</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->supplier->name}}</td>
                        <td>{{$product->supplier->site}}</td>
                        <td>{{$product->weight}}</td>
                        <td>{{$product->unit_id}}</td>
                        <td>{{$product->productDetail->weight ?? ''}}</td>
                        <td>{{$product->productDetail->height ?? ''}}</td>
                        <td>{{$product->productDetail->width ?? ''}}</td>
                        <td><a href="{{ route('product.show',$product->id) }}">Visualizar</td>
                        <td>
                            <form method="post" id="form_{{$product->id}}" action="{{ route('product.destroy',$product->id) }}">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit">Excluir</button> --}}
                                <a href="#" onclick="document.getElementById('form_{{$product->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{ route('product.edit',['product' => $product->id]) }}">Editar</a></td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <p>Pedidos</p>
                            @foreach ( $product->orders as $order )
                                <a href="{{ route('product_order.create',[ 'order' => $order->id ]) }}">
                                    Order {{ $order->id }}, 
                                    </a>
                            @endforeach
                            
                        </td>
                    </tr>
            @endforeach
                </tbody>
            </table>
            {{-- para ver lazy e eager loading  --}}
            {{-- {{ $products->toJson()}}  --}}
            {{ $products->appends($request)->links() }}
            {{-- ->appends($request) evita que se percam as pesquisas quando se carrega nos links  --}}
            <br>
            Exibindo {{ $products->count() }} do total de  {{ $products->total() }} ({{ $products->firstItem() }} - {{ $products->lastItem() }})
        </div>
    </div>
</div>
@endsection