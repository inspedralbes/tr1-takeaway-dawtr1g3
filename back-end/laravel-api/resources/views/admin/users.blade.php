@extends('app')

@section('content')

<div class="container">

        <h1 class="subtitle is-3 mt-3 has-text-centered">Gestió de usuaris</h1>

        <div class="table-container">
            <table class="table is-striped is-narrow is-fullwidth mb-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Cognoms</th>
                        <th>Email</th>
                        <th>Tipus</th>
                        <th>Accions</th>
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
                            <form action="{{ route ('userdestroy', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="button is-danger is-light mt-2" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>

@endsection
