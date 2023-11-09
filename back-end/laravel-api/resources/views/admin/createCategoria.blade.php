@extends('app')

@section('content')
    <div class="columns is-centered mt-2">
        <div class="column is-half">
            <div class="box">
                <h1 class="title is-4 has-text-centered">Afegir Nova Categoria</h1>

                <form action="{{ route('categoriacreate') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="field">
                        <label class="label">Nom:</label>
                        <div class="control">
                            <input class="input" type="text" name="nom">
                        </div>
                    </div>

                    <div class="field is-grouped is-justify-content-center">
                        <div class="control">
                            <button class="button is-success" type="submit" >Desar Categoria</button>
                        </div>
                        <div class="control">
                            <a class="button is-link is-danger is-light" href="{{ route('categories') }}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
