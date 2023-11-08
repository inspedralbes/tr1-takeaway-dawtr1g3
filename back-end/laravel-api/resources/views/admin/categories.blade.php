@extends('app')

@section('content')

<div class="container">

        <h1 class="subtitle is-3 mt-3 has-text-centered">Gestió de categories</h1>

        <div class="table-container">
            <table class="table is-striped is-narrow is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Accio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nom }}</td>
                        <td>
                            <a class="button is-link is-light" href="{{ route ('categoria', ['id' => $categoria->id]) }}">Actualitzar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection