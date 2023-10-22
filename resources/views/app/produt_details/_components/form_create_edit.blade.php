
    {{ $msg ?? '' }}
    @if(isset($product_details->id))
        <form method="post" action="{{ route('product_details.update',['product_details' => $product_details->id]) }}">
            @csrf
            @method('PUT')
    @else
        <form method="post" action="{{ route('product_details.store') }}">
            @csrf
    @endif
        {{-- <input type="hidden" name="id" value="{{ $product_details->id ?? '' }}"> --}}
        <input type="text" value="{{ $product_details->product_id ?? old('product_id') }}" name="product_id" placeholder="ID do Product" class="borda-preta">
        {{ $errors->has('product_id') ? $errors->first('product_id') : '' }} 
        <input type="text" value="{{ $product_details->weight ?? old('weight') }}" name="weight" placeholder="Comprimento" class="borda-preta">
        {{ $errors->has('weight') ? $errors->first('weight') : '' }}
        <input type="text" value="{{ $product_details->width ?? old('width') }}" name="width" placeholder="Largura" class="borda-preta">
        {{ $errors->has('width') ? $errors->first('width') : '' }}
        <input type="text" value="{{ $product_details->height ?? old('height') }}" name="height" placeholder="Altura" class="borda-preta">
        {{ $errors->has('height') ? $errors->first('height') : '' }}
        <select  name="unit_id" class="borda-preta">
            <option>Selecione a unit de medida</option>
            @foreach ($units as $unit)                        
                <option value="{{$unit->id}}" {{ ($product_details->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : ''}}>{{$unit->descricao}}</option>
            @endforeach
        </select>
        {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>