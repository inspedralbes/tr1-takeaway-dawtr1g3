@extends('app')

@section('content')

<div>
    <form action="{{ route ('comandes') }}" method="GET">
        @csrf
        <button class="button is-primary" type="submit">Edit Comandes</button>
    </form>
    <br>
    <form action="{{ route ('productes') }}" method="GET">
        @csrf
        <button class="button is-info" type="submit">Edit Productes</button>
    </form>

</div>

@endsection
