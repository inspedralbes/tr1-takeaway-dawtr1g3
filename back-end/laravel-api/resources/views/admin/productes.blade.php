@extends('app')

@section('content')

<div>
    <h1 class="subtitle is-3">Gestió de Productes</h1>

    <div>
        <ul>
            @foreach ($productes as $producte)
            <li class="m-3">{{ $producte->id }}, Nom: {{ $producte->nom }}, Descripcio: {{ $producte->descripcio }}, Preu: {{ $producte->preu }} <a class="button is-link is-light" href="{{ route ('producte', ['id' => $producte->id]) }}">Actualitzar Producte</a></li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
