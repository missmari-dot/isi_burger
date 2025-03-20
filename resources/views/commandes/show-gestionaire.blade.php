@extends('layouts.app')

@section('title', 'Détails de la commande')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <!-- En-tête de la carte -->
            <div class="card-header" data-background-color="dark">
                <h4 class="mb-0">Commande #{{ $commande->id }}</h4>
            </div>

            <!-- Corps de la carte -->
            <div class="card-body">
                <!-- Informations de la commande -->
                <div class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <p class="mb-2"><strong>Client :</strong> <span class="text-dark">{{ $commande->client ? $commande->client->name : 'Inconnu' }}</span></p>
                            <p class="mb-2"><strong>Montant total :</strong> <span class="text-success">{{ $commande->montant_total }} €</span></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2"><strong>Date :</strong> <span class="text-muted">{{ $commande->created_at->format('d/m/Y H:i') }}</span></p>
                            <p class="mb-0"><strong>Statut :</strong> <span class="badge bg-info">{{ ucfirst($commande->statut) }}</span></p>
                        </div>
                    </div>
                </div>

                <!-- Liste des produits commandés -->
                <h3 class="mb-3">Produits commandés</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix unitaire</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commande->burgers as $produit)
                                <tr>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->pivot->quantite }}</td>
                                    <td>{{ $produit->prix }} f</td>
                                    <td class="text-success">{{ $produit->pivot->quantite * $produit->prix }} f</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Formulaire de mise à jour du statut -->
                <h3 class="mt-4 mb-3">Modifier le statut</h3>
                <form method="POST" action="{{ route('commandes.updateStatut', $commande) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row g-3 align-items-center">
                        <div class="col-md-8">
                            <select name="statut" class="form-select">
                                 <option value="en_attente" {{ $commande->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                 <option value="en_preparation" {{ $commande->statut == 'en_preparation' ? 'selected' : '' }}>En préparation</option>
                                 <option value="prete" {{ $commande->statut == 'prete' ? 'selected' : '' }}>Prête</option>
                                 <option value="payee" {{ $commande->statut == 'payee' ? 'selected' : '' }}>Payée</option>
                                 <option value="annulee" {{ $commande->statut == 'annulee' ? 'selected' : '' }}>Annulée</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-sync-alt me-2"></i> Mettre à jour
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection