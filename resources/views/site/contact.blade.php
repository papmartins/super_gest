@extends('site.layouts.basic')

@section('title',$title)

@section('content')

    <div class="content-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contact conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contact-principal">
                @component('site.layouts._components.form_contact', ['classe' => 'borda-preta', 'contact_reason' => $contact_reason])
                    <p>Our suport team will analise your question.</p>
                    <p>The avarege time to answer is 48 hors.</p>
                @endcomponent
            </div>
        </div>  
    </div>
{{-- {{ print_r($contact_reason)}} --}}
    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png')}}">
            <img src="{{ asset('img/linkedin.png')}}">
            <img src="{{ asset('img/youtube.png')}}">
        </div>
        <div class="area-contact">
            <h2>Contact</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png')}}">
        </div>
    </div>
@endsection