@extends('app')

@section('content')
    <div class="container mt-3">
        <div class="columns is-centered is-vcentered">
            <div class="column is-6">
                <div class="box">
                    <h1 class="title is-3 has-text-centered">Actualitzar Comanda</h1>

                    <fieldset disabled>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <label class="label">ID Comanda:</label>
                                    <div class="control">
                                        <input class="input" type="number" value="{{ $comanda->id }}">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Email:</label>
                                    <div class="control">
                                        <input class="input" type="email" value="{{ $comanda->usuari }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <label class="label">Total:</label>
                                    <div class="control">
                                        <input class="input" type="text" value="{{ $comanda->total }}€">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Estat Actual:</label>
                                    <div class="control">
                                        <input class="input" type="text" value="{{ $comanda->estat }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <br>

                    <form action="{{ route('comandaupdate', ['id' => $comanda->id]) }}" method="post">
                        @method('PATCH')
                        @csrf

                        <div class="field has-text-centered">
                            <label class="label">Estat:</label>
                            <div class="control">
                                <div class="select">
                                    <select name="estat" id="estat" class="form-control">
                                        @foreach ($estats as $estat)
                                            @if ($estat != $comanda->estat)
                                                <option value="{{ $estat }}">
                                                    {{ $estat }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="has-text-centered">
                            <button type="submit" class="button is-success">Actualizar Comanda</button>
                            <a class="button is-danger is-light" href="{{ route('comandes') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
