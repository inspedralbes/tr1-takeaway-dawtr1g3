@extends('app')

@section('content')

<div class="container">

        <h1 class="subtitle is-3 mt-3 has-text-centered">Gestió de comandes</h1>

        <div class="table-container">
            <table class="table is-striped is-narrow is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuari</th>
                        <th>Total</th>
                        <th>Estat</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comandes as $comanda)
                    <tr>
                        <td>{{ $comanda->id }}</td>
                        <td>{{ $comanda->usuari }}</td>
                        <td>{{ $comanda->total }}</td>
                        <td>{{ $comanda->estat }}</td>
                        <td>
                            <a class="button is-link is-light" href="{{ route ('comanda', ['id' => $comanda->id]) }}">Actualitzar Comanda</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection
