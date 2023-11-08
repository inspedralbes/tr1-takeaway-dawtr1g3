@extends('app')

@section('content')

<div class="container">
    <h1 class="subtitle is-3 has-text-centered mt-3">Gestió de Productes</h1>

    <div class="has-text-centered">
        <a class="button is-warning is-medium has-text-white mt-2 mb-2" href="{{ route('productecreateview') }}">Afegir Nou Producte</a>
    </div>

    <div class="table-container">
        <table class="table is-striped is-narrow is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Descripcio</th>
                    <th>Preu</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productes as $producte)
                <tr>
                    <td>{{ $producte->id }}</td>
                    <td>{{ $producte->nom }}</td>
                    <td>{{ $producte->descripcio }}</td>
                    <td>{{ $producte->preu }}</td>
                    <td>
                        <a class="button is-link is-light mt-1 mb-1" href="{{ route ('producte', ['id' => $producte->id]) }}">Actualitzar</a>
                        <a class="button is-danger is-light mt-1 mb-1" href="{{ route ('productedestroy', ['id' => $producte->id]) }}">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
