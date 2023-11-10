@extends('app')

@section('content')

<div class="has-text-centered mt-5">
    <div class="buttons is-centered">
        <a class="button is-info is-medium" href="{{ route('comandes') }}">Administrar Comandes</a>
        <a class="button is-success is-medium" href="{{ route('productes') }}">Administrar Productes</a>
        <a class="button is-warning is-medium" href="{{ route('categories') }}">Administrar Categories</a>
        <a class="button is-danger   is-medium" href="{{ route('users') }}">Administrar Usuaris</a>
    </div>
</div>

@endsection
