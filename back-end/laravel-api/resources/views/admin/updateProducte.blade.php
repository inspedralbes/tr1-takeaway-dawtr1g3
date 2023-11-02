@extends('app')

@section('content')
    <div class="box mt-2 mb-4 mr-2 ml-2">
        <h1 class="subtitle is-3 has-text-centered">Actualitzar Producte {{ $producte->id }}</h1>

        <div class="field">
            <label class="label">ID Producte:</label>
            <div class="control">
                <input class="input" type="number" value="{{ $producte->id }}">
            </div>
        </div>

        <form action="{{ route('producteupdate', ['id' => $producte->id]) }}" method="post"  enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="columns">
                <div class="column is-4">
                    <div class="field">
                        <label class="label">Nom:</label>
                        <div class="control">
                            <input class="input" type="text" name="nom" value="{{ $producte->nom }}">
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="field">
                        <label class="label">Preu (€):</label>
                        <div class="control">
                            <input class="input" type="number" name="preu" value="{{ $producte->preu }}">
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="field">
                        <label for="categoria_id" class="label">Categoria del producte:</label>
                        <div class="control">
                            <div class="select">
                                <select name="categoria_id" class="form-select">
                                    @foreach ($categories as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            {{ $categoria->id == $producte->categoria_id ? 'selected' : '' }}>
                                            {{ $categoria->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">Descripció:</label>
                <div class="control">
                    <input class="input" type="text" name="descripcio" value="{{ $producte->descripcio }}">
                </div>
            </div>

            <br>

            <div class="columns">
                <div class="column is-4">
                    <div class="field">
                        <label class="label">Imatge Actual:</label>
                        <div class="control">
                            @if ($producte->imatge)
                                <img src="{{ asset($producte->imatge) }}" class="is-small-image" alt="{{ $producte->imatge }}">
                            @else
                                <p>Ninguna</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="field">
                        <label class="label">Nova Imatge (.png):</label>
                        <input type="file" name="imatge" accept=".png" />
                    </div>
                </div>
            </div>

            <div class="field is-grouped is-justify-content-center">
                <div class="control">
                    <button class="button is-success" type="submit">Desar canvis</button>
                </div>
                <div class="control">
                    <a class="button is-link is-danger is-light" href="{{ route('productes') }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
