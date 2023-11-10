@extends('app')

@section('content')
<div class="columns is-centered mt-2">
    <div class="column is-half">
        <div class="box">
            <h1 class="title is-4 has-text-centered">Afegir Nou Usuari</h1>

            <form action="{{ route('usercreate') }}" method="POST">
                @csrf
                
                <div class="field">
                    <label class="label">Nom:</label>
                    <div class="control">
                        <input class="input" type="text" name="nom">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Cognoms:</label>
                    <div class="control">
                        <input class="input" type="text" name="cognoms">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Correu electrónic:</label>
                    <div class="control">
                        <input class="input" type="email" name="email">
                    </div>
                </div>

                <div class="field">
                    <label for="categoria_id" class="label">Tipus usuari:</label>
                    <div class="control">
                        <div class="select">
                            <select name="tipus" class="form-select">
                                @foreach ($tipusUser as $typeUser)
                                    <option value="{{ $typeUser->id }}">
                                        {{ $typeUser->tipus }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field is-grouped is-justify-content-center">
                    <div class="control">
                        <button class="button is-success" type="submit">Crear usuari</button>
                    </div>
                    <div class="control">
                        <a class="button is-link is-danger is-light" href="{{ route('users') }}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
