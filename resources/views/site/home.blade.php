@extends('site.layouts.basic')

@section('title','Home')

@section('content')
    <div class="content-destaque">
        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Super Gestão</h1>
                <p>Software para gestão empresarial ideal para sua empresa.<p>
                <div class="chamada">
                    <img src="{{ asset('img/check.png')}}">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('img/check.png')}}">
                    <span class="texto-branco">Sua empresa na nuvem</span>
                </div>
            </div>

            <div class="video">
                <img src="{{ asset('img/player_video.jpg')}}">
            </div>
        </div>

        <div class="direita">
            <div class="contact">
                <h1>Contact</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contact com nossa equipe pelo formulário abaixo.<p>
                @component('site.layouts._components.form_contact', ['classe' => 'borda-branca', 'contact_reason' => $contact_reason])
                    
                @endcomponent
            </div>
        </div>
    </div>
@endsection