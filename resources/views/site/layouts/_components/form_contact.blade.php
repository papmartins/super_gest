{{ $slot }}

<form action={{ route('site.contact') }} method="post">
    @csrf <!-- Cria o token -->
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nome" class="{{ $classe }}">
    @if($errors->has('name'))
        {{ $errors->first('name') }}
    @endif
    <br>
    <input type="text" name="phone"value="{{ old('phone') }}" placeholder="phone" class="{{ $classe }}">
    {{ $errors->has('phone') ? $errors->first('phone') : '' }}
    <br>
    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select class="{{ $classe }}" name="contact_reason_id">
        <option value="">Qual o motivo do contato?</option>
        @foreach($contact_reason as $key => $contact_reason)
        {{--  old('contact_reason')  traz os valores anteriores  --}}
            <option value="{{$contact_reason->id}}" {{ old('contact_reason_id') == $contact_reason->id ? 'selected' : '' }}>{{$contact_reason->reason}}</option>
        @endforeach
        
    </select>
    {{ $errors->has('contact_reason_id') ? $errors->first('contact_reason_id') : '' }}
    <br>
    <textarea class="{{ $classe }}" name="message">{{ ( old('message') != '' ? old('message') : "Preencha aqui a sua mensagem" ) }}</textarea>
    {{ $errors->has('message') ? $errors->first('message') : '' }}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{-- @if($errors->any())
<div style="position:absolute;top:0px;left:0px;width:100%;background:red">
    @foreach($errors->all() as $error)
        {{ $error }}
        <br>
    @endforeach
</div>
@endif --}}
