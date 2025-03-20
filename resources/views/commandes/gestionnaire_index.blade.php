@extends('layouts.app')

@section('content')
<div class="container">
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
                                <th>N°</th>
                                <th>Client</th>
                                <th>Montant Total</th>
                                <th>Statut</th>
                                <th>Produits</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($commandes as $commande)
                            <tr>
                                <td>{{ $commande->id }}</td>
                                <td>{{ $commande->client ? $commande->client->name : 'Inconnu' }}</td>
                                <td>{{ $commande->montant_total }} f</td>
                                <td>{{ ucfirst($commande->statut) }}</td>
                                <td>
                                    @foreach($commande->burgers as $burger)
                                        {{ $burger->nom }} (x{{ $burger->pivot->quantite }}) <br>
                                    @endforeach
                                </td>
                                <td class="text-end gap-1">
                                    <!-- Bouton Détails -->
                                    <a href="{{ route('gestionnaire.commandes.show', $commande) }}" class="btn btn-info btn-sm">Détails</a>

                                    <!-- Bouton "Marquer comme Prête" -->
                                    @if ($commande->statut !== 'prete' && $commande->statut !== 'payee')
                                        <form action="{{ route('commandes.updateStatut', $commande) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="statut" value="prete">
                                            <button type="submit" class="btn btn-warning btn-sm">Marquer Prête</button>
                                        </form>
                                    @endif

                                    <!-- Bouton "Marquer comme Payée" -->
                                    @if ($commande->statut === 'prete')
                                        <form action="{{ route('paiements.store', $commande) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Marquer Payée</button>
                                        </form>
                                    @elseif ($commande->statut === 'payee')
                                        <button class="btn btn-secondary btn-sm" disabled>Déjà Payée</button>
                                    @endif

                                    <!-- Bouton Annuler -->
                                    @if ($commande->statut !== 'payee')
                                        <form action="{{ route('commandes.annuler', $commande) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler cette commande ?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Annuler</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucune commande disponible.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- Fin table-responsive -->
            </div> <!-- Fin card-body -->
        </div> <!-- Fin card -->
    </div> <!-- Fin col-md-12 -->
</div> <!-- Fin container -->
@endsection
