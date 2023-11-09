@extends('app')

@section('content')
    <div class="container mt-3">
        <div class="columns is-centered is-vcentered">
            <div class="column is-6">
                <div class="box">
                    <h1 class="title is-3 has-text-centered">Actualitzar Usuari</h1>

                    <div class="field">
                        <label class="label">ID Usuari:</label>
                        <div class="control">
                            <input class="input" type="number" value="{{ $user->id }}" disabled>
                        </div>
                    </div>
                    <form action="{{ route('userupdate', ['id' => $user->id]) }}" method="post"  enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="columns">
                            <div class="column is-4">
                                <div class="field">
                                    <label for="categoria_id" class="label">Tipus d'usuari:</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="categoria_id" class="form-select">
                                                @foreach ($tipusUsuaris as $tipusUsuari)
                                                <option value="{{ $tipusUsuari->id }}">
                                                {{ $tipusUsuari->tipus }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
