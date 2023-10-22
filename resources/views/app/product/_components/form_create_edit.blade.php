
    {{ $msg ?? '' }}
    @if(isset($product->id))
        <form method="post" action="{{ route('product.update',['product' => $product->id]) }}">
            @csrf
            @method('PUT')
    @else
        <form method="post" action="{{ route('product.store') }}">
            @csrf
    @endif
        {{-- <input type="hidden" name="id" value="{{ $product->id ?? '' }}"> --}}
        <select  name="supplier_id" class="borda-preta">
            <option>Selecione o fonecedor</option>
            @foreach ($suppliers as $supplier)                        
                <option value="{{$supplier->id}}" {{ ($product->supplier_id ?? old('supplier_id')) == $supplier->id ? 'selected' : ''}}>{{$supplier->name}}</option>
            @endforeach
        </select>
        {{ $errors->has('supplier_id') ? $errors->first('supplier_id') : '' }}
        <input type="text" value="{{ $product->name ?? old('name') }}" name="name" placeholder="Nome" class="borda-preta">
        {{ $errors->has('name') ? $errors->first('name') : '' }} 
        <input type="text" value="{{ $product->description ?? old('description') }}" name="description" placeholder="Descrição" class="borda-preta">
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
        <input type="text" value="{{ $product->weight ?? old('weight') }}" name="weight" placeholder="Peso" class="borda-preta">
        {{ $errors->has('peso') ? $errors->first('weight') : '' }}
        <select  name="unit_id" class="borda-preta">
            <option>Selecione a unidade de medida</option>
            @foreach ($units as $unit)                        
                <option value="{{$unit->id}}" {{ ($product->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : ''}}>{{$unit->description}}</option>
            @endforeach
        </select>
        {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>