@extends('app')

@section('content')
    <div>
        <h1 class="subtitle is-2">Actualitzar Comanda</h1>

        <fieldset disabled>
            <div class="field is-horitzontal">
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

                <div class="field">
                    <label class="label">Total:</label>
                    <div class="control">
                        <input class="input" type="text" value="{{ $comanda->total }}€">
                    </div>
                </div>
            </div>
        </fieldset>

        <br>

        <form action="{{ route('comandaupdate', ['id' => $comanda->id]) }}" method="post">
            @method('PATCH')
            @csrf

            <label class="label" for="estat">Estat:</label>
            <div class="select">
                <select name="estat" id="estat" class="form-control">
                    @foreach ($estats as $estat)
                        <option value="{{ $estat }}" {{ $comanda->estat == $estat ? 'selected' : '' }}>
                            {{ $estat }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="button is-success">Actualizar tarea</button>
        </form>

    </div>
@endsection
