
    {{ $msg ?? '' }}
    <form method="post" action="{{ route('product_order.store',['order' => $order]) }}">
            @csrf
        <select  name="product_id" class="borda-preta">
            <option>Selecione o Product</option>
            @foreach ($products as $product)                        
                <option value="{{$product->id}}" {{ ( old('product_id')) == $product->id ? 'selected' : ''}}>{{$product->name}}</option>
            @endforeach
        </select>
        {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}
        {{-- <input type="number" name="quantidade" value="{{$product->quantity}}" {{ old('quantidade') ? old('quantidade') : '0' }}
            placeholder="Quantidade" class="borda-preta"> --}}
        {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>