@extends('app')

@section('content')

<div>
    <h1>Gestió de comandes</h1>

    <div>
        <ul>
            @foreach ($comandes as $comanda)
            <li>{{ $comanda->id }}, Usuari: {{ $comanda->usuari }}, Total: {{ $comanda->total }}</li> <a href="{{ route ('comanda', ['id' => $comanda->id]) }}">Actualitzar Comanda</a>
            @endforeach
        </ul>
    </div>
</div>

@endsection
