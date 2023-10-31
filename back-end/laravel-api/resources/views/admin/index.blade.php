@extends('app')

@section('content')

<div>
    <form action="{{ route ('comandes') }}" method="GET">
        @csrf
        <button type="submit">Edit Comandes</button>
    </form>
    <br>
    <form action="{{ route ('productes') }}" method="GET">
        @csrf
        <button type="submit">Edit Productes</button>
    </form>

</div>

@endsection
