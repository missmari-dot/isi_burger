@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Passer une Commande</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('commandes.store') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Burger</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                @foreach($burgers as $burger)
                <tr>
                    <td>
                        <input type="checkbox" name="burgers[]" value="{{ $burger->id }}">
                        {{ $burger->nom }}
                    </td>
                    <td>{{ $burger->prix }} €</td>
                    <td>
                        <input type="number" name="quantites[{{ $burger->id }}]" class="form-control" min="1" max="{{ $burger->stock }}" value="1">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Commander</button>
    </form>
</div>
@endsection
