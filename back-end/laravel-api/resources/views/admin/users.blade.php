@extends('app')

@section('content')

<div class="container">

        <h1 class="subtitle is-3 mt-3 has-text-centered">Gestió de usuaris</h1>


        <div class="has-text-centered">
            <a class="button is-warning is-medium has-text-white mt-2 mb-2" href="{{ route('usercreateview') }}">Afegir Nou Usuari</a>
        </div>

        <div class="table-container">
            <table class="table is-striped is-narrow is-fullwidth">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Cognoms</th>
                        <th>Email</th>
                        <th>Tipus</th>
                        <th>Accio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->cognoms}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->tipus}}</td>
                        <td>
                            <a class="button is-link is-light" href="{{ route ('user', ['id' => $user->id]) }}">Actualitzar</a>
                            <a class="button is-danger is-light" href="{{ route ('userdestroy', ['id' => $user->id]) }}">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection