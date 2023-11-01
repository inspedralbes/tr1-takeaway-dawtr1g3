@extends('app')

@section('content')

<div>
    <h1 class="subtitle is-3">Gestió de comandes</h1>

    <div>
        <ul>
            @foreach ($comandes as $comanda)
            <li class="m-3">{{ $comanda->id }}, Usuari: {{ $comanda->usuari }}, Total: {{ $comanda->total }}, Estat: {{ $comanda->estat }} <a class="button is-link is-light" href="{{ route ('comanda', ['id' => $comanda->id]) }}">Actualitzar Comanda</a></li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
