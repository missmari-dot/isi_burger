@extends('layouts.app')

@section('content')

    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste des Commandes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>N° de Commande</th>
                                        <th>Montant Total</th>
                                        <th>Statut</th>
                                        <th>Produits</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($commandes as $commande)
                                        <tr>
                                            <td>{{ $commande->id }}</td>
                                            <td>{{ $commande->montant_total }} €</td>
                                            <td>
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
                                            </td>
                                            <td>
                                                @foreach($commande->burgers as $burger)
                                                    {{ $burger->nom }} (x{{ $burger->pivot->quantite }})<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i> Détails
                                                </a>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"><h5>Aucune commande passée.</h5></td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

