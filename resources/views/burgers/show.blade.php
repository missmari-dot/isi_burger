@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $burger->nom }}</h2>
    <img src="{{ asset('storage/'.$burger->image) }}" width="300">
    <p><strong>Prix :</strong> {{ $burger->prix }} €</p>
    <p><strong>Description :</strong> {{ $burger->description }}</p>
    <p><strong>Stock :</strong> {{ $burger->stock }}</p>

    @if($burger->enStock())
        <a href="#" class="btn btn-primary">Commander</a>
    @else
        <button class="btn btn-secondary" disabled>Rupture</button>
    @endif
</div>
@endsection
