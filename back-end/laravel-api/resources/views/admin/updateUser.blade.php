@extends('app')

@section('content')
    <div class="container mt-3">
        <div class="columns is-centered is-vcentered">
            <div class="column is-6">
                <div class="box">
                    <h1 class="title is-3 has-text-centered">Actualitzar Usuari</h1>
                    <form action="{{ route('userupdate', ['id' => $user->id]) }}" method="post">
                        @method('PATCH')
                        @csrf

                        <fieldset disabled>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <label class="label">ID usuari:</label>
                                        <div class="control">
                                            <input class="input" type="number" name="id" value="{{ $user->id }}">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Email:</label>
                                        <div class="control">
                                            <input class="input" type="email" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <label class="label">Nom:</label>
                                        <div class="control">
                                            <input class="input" type="text" name="nom" value="{{ $user->nom }}">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Cognoms:</label>
                                        <div class="control">
                                            <input class="input" type="email" name="cognoms"
                                                value="{{ $user->cognoms }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="field has-text-centered mt-2">
                            <label for="categoria_id" class="label">Tipus usuari:</label>
                            <div class="control">
                                <div class="select">
                                    <select name="tipus" class="form-select">
                                        @foreach ($tipusUsuaris as $tipusUsuari)
                                            <option value="{{ $tipusUsuari->id }}"
                                                {{ $user->tipus == $tipusUsuari->id ? 'selected' : '' }}>
                                                {{ $tipusUsuari->tipus }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field is-grouped is-justify-content-center">
                            <div class="control">
                                <button class="button is-success" type="submit">Desar canvis</button>
                            </div>
                            <div class="control">
                                <a class="button is-link is-danger is-light" href="{{ route('users') }}">Cancel</a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
