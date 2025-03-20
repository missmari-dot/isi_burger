@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Détails de la Commande #{{ $commande->id }}</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informations de la commande</h5>
            <p><strong>Montant total :</strong> {{ $commande->montant_total }} €</p>
            <p><strong>Statut :</strong>
                @if ($commande->statut === 'payee')
                    <span class="badge bg-success">Payée</span>
                @elseif ($commande->statut === 'prete')
                    <span class="badge bg-warning">Prête</span>
                @elseif ($commande->statut === 'en_preparation')
                    <span class="badge bg-primary">En préparation</span>
                @elseif ($commande->statut === 'annulee')
                    <span class="badge bg-danger">Annulée</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($commande->statut) }}</span>
                @endif
            </p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Produits commandés</h5>
            <ul class="list-group">
                @foreach($commande->burgers as $burger)
                    <li class="list-group-item">
                        <strong>{{ $burger->nom }}</strong><br>
                        Quantité : {{ $burger->pivot->quantite }}<br>
                        Prix unitaire : {{ $burger->pivot->prix_unitaire }} €<br>
                        Total : {{ $burger->pivot->quantite * $burger->pivot->prix_unitaire }} €
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour à la liste des commandes</a>
    </div>
</div>
@endsection