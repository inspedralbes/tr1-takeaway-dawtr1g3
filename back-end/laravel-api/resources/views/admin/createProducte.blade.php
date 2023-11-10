@extends('app')

@section('content')
    <div class="columns is-centered mt-2">
        <div class="column is-half">
            <div class="box">
                <h1 class="title is-4 has-text-centered">Afegir Nou Producte</h1>

                <form action="{{ route('productecreate') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="field">
                        <label class="label">Nom:</label>
                        <div class="control">
                            <input class="input" type="text" name="nom">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Preu (€):</label>
                        <div class="control">
                            <input class="input" type="number" name="preu">
                        </div>
                    </div>

                    <div class="field">
                        <label for="categoria_id" class="label">Categoria del producte:</label>
                        <div class="control">
                            <div class="select">
                                <select name="categoria_id" class="form-select">
                                    @foreach ($categories as $categoria)
                                        <option value="{{ $categoria->id }}">
                                            {{ $categoria->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Descripció:</label>
                        <div class="control">
                            <input class="input" type="text" name="descripcio">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Insereix Imatge (.png):</label>
                        <div class="control">
                            <input type="file" class="form-control" name="imatge" accept=".png" />
                        </div>
                    </div>

                    <div class="field is-grouped is-justify-content-center">
                        <div class="control">
                            <button class="button is-success" type="submit">Desar Producte</button>
                        </div>
                        <div class="control">
                            <a class="button is-link is-danger is-light" href="{{ route('productes') }}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
