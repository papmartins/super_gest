
    {{ $msg ?? '' }}
    @if(isset($order->id))
        <form method="post" action="{{ route('order.update',['order' => $order->id]) }}">
            @csrf
            @method('PUT')
    @else
        <form method="post" action="{{ route('order.store') }}">
            @csrf
    @endif
    
        <select  name="customer_id" class="borda-preta">
            <option>Selecione o Customer</option>
            @foreach ($customers as $customer)                        
                <option value="{{$customer->id}}" {{ ($order->customer_id ?? old('customer_id')) == $customer->id ? 'selected' : ''}}>{{$customer->name}}</option>
            @endforeach
        </select>
        {{ $errors->has('customer_id') ? $errors->first('customer_id') : '' }}
        
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>