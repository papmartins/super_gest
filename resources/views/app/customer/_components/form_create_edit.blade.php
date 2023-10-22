
    {{ $msg ?? '' }}
    @if(isset($customer->id))
        <form method="post" action="{{ route('customer.update',['customer' => $customer->id]) }}">
            @csrf
            @method('PUT')
    @else
        <form method="post" action="{{ route('customer.store') }}">
            @csrf
    @endif
        {{-- <input type="hidden" name="id" value="{{ $customer->id ?? '' }}"> --}}
        <input type="text" value="{{ $customer->name ?? old('name') }}" name="name" placeholder="Nome" class="borda-preta">
        {{ $errors->has('name') ? $errors->first('name') : '' }} 
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>