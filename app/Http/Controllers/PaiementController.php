<?php
namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function store(Request $request, Commande $commande)
    {
        // Vérifier si la commande est déjà payée
        if ($commande->paiement) {
            return redirect()->back()->with('error', 'Cette commande est déjà payée.');
        }

        // Enregistrer le paiement
        $paiement = new Paiement([
            'commande_id' => $commande->id,
            'montant' => $commande->montant_total,
            'methode' => 'especes', // Pour le moment, seulement en espèces
            'date_paiement' => now(),
        ]);
        $paiement->save();

        // Mettre à jour le statut de la commande
        $commande->update(['statut' => 'payee']);

        return redirect()->route('gestionnaire.commandes.index')->with('success', 'Paiement enregistré avec succès.');
    }
}
