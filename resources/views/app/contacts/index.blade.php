@extends('app.layouts.basic')

@section('title','Customer')

@section('content')
<div class="content-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Contactos</p>
    </div>
    <div class="informacao-pagina">
        <div style="width:90%;margin-left:auto;margin-right:auto;">
        {{-- para ver lazy e eager loading  --}}
        {{-- {{ $products->toJson()}}  --}}
            <table border=1 width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Contact reason</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->contact_reason_id}}</td>
                        <td>{{$contact->message}}</td>
                    </tr>
            @endforeach 
                </tbody>
            </table>
            {{-- para ver lazy e eager loading  --}}
            {{-- {{ $products->toJson()}}  --}}
            {{ $contacts->appends($request)->links() }}
            {{-- ->appends($request) evita que se percam as pesquisas quando se carrega nos links  --}}
            <br>
            Exibindo {{ $contacts->count() }} do total de  {{ $contacts->total() }} ({{ $contacts->firstItem() }} - {{ $contacts->lastItem() }})
        </div>
    </div>
</div>
@endsection