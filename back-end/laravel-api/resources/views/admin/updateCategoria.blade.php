@extends('app')

@section('content')
    <div class="container mt-3">
        <div class="columns is-centered is-vcentered">
            <div class="column is-6">
                <div class="box">
                    <h1 class="title is-3 has-text-centered">Actualitzar Categoria</h1>

                    <div class="field">
                        <label class="label">ID Categoria:</label>
                        <div class="control">
                            <input class="input" type="number" value="{{ $categoria->id }}" disabled>
                        </div>
                    </div>
                    <form action="{{ route('categoriaupdate', ['id' => $categoria->id]) }}" method="post"  enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="columns">
                            <div class="column is-4">
                                <div class="field">
                                    <label class="label">Nom:</label>
                                    <div class="control">
                                        <input class="input" type="text" name="nom" value="{{ $categoria->nom }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped is-justify-content-center">
                            <div class="control">
                                <button class="button is-success" type="submit" href="{{ route('categories') }}">Desar canvis</button>
                            </div>
                            <div class="control">
                                <a class="button is-link is-danger is-light" href="{{ route('categories') }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
