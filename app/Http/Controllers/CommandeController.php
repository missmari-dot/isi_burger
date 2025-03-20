<?php
namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Burger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\CommandePreteMail;
use Illuminate\Support\Facades\Mail;

class CommandeController extends Controller
{

    public function index()
    {
        $commandes = Commande::where('user_id', Auth::id())->get();
        return view('commandes.client_index', compact('commandes'));
    }

    public function indexGestionnaire()
    {
        $commandes = Commande::with('client')->get(); // Chargement du client associé
        return view('commandes.gestionnaire_index', compact('commandes'));
    }


    public function create()
    {
        $burgers = Burger::where('stock', '>', 0)->get();
        return view('commandes.create', compact('burgers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'burgers' => 'required|array',
            'burgers.*' => 'exists:burgers,id',
            'quantites' => 'required|array',
            'quantites.*' => 'integer|min:1',
        ]);

        $montant_total = 0;
        $commande = new Commande([
            'user_id' => Auth::id(),
            'montant_total' => 0,
            'statut' => 'en_attente'
        ]);
        $commande->save();

        foreach ($request->burgers as $burger_id) {
            $burger = Burger::find($burger_id);
            $quantite = $request->quantites[$burger_id];

            if ($burger->stock < $quantite) {
                return redirect()->back()->with('error', "Stock insuffisant pour {$burger->nom}.");
            }

            $montant_total += $burger->prix * $quantite;
            $commande->burgers()->attach($burger->id, ['quantite' => $quantite]);

            // Réserve seulement les stocks sans les supprimer directement
            if ($burger->stock >= $quantite) {
                $burger->stock -= $quantite;
            } else {
                return redirect()->back()->with('error', "Stock insuffisant pour {$burger->nom}.");
            }
            $burger->save();

        }

        $commande->update(['montant_total' => $montant_total]);

        return redirect()->route('commandes.index')->with('success', 'Commande passée avec succès.');
    }



    public function show(Commande $commande)
    {
        $commande->load('client', 'burgers'); // Charge la relation client et burgers
        return view('commandes.show', compact('commande'));
    }
    
    public function showCommande(Commande $commande)
    {
        $commande->load('client', 'burgers'); 
        return view('commandes.show-gestionaire', compact('commande'));
    }


    
    public function annuler(Commande $commande)
    {
        // Vérifier si la commande est déjà payée (Impossible à annuler)
        if ($commande->statut === 'payee') {
            return redirect()->back()->with('error', 'Impossible d\'annuler une commande déjà payée.');
        }
    
        // Restaurer le stock des produits
        foreach ($commande->burgers as $burger) {
            $burger->stock += $burger->pivot->quantite;
            $burger->save();
        }
    
        // Modifier le statut de la commande au lieu de la supprimer
        $commande->update(['statut' => 'annulee']);
    
        return redirect()->route('gestionnaire.commandes.index')->with('success', 'Commande annulée avec succès.');
    }
    

    public function commander(Request $request)
    {
        $request->validate([
            'burger_id' => 'required|exists:burgers,id',
            'quantite' => 'required|integer|min:1',
        ]);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer le burger
        $burger = Burger::findOrFail($request->burger_id);

        // Vérifier si le burger est en stock
        if (!$burger->enStock()) {
            return redirect()->back()->with('error', 'Ce burger est en rupture de stock.');
        }

        // Calculer le montant total
        $montantTotal = $burger->prix * $request->quantite;

        // Créer la commande
        $commande = Commande::create([
            'user_id' => $user->id,
            'montant_total' => $montantTotal,
            'statut' => 'en_attente',
        ]);

        // Ajouter le burger à la commande
        $commande->burgers()->attach($burger->id, ['quantite' => $request->quantite]);

        // Mettre à jour le stock du burger
        $burger->stock -= $request->quantite;
        $burger->save();

        return redirect()->route('commandes.index')->with('success', 'Votre commande a été passée avec succès.');
    }
    


    public function updateStatut(Request $request, Commande $commande)
    {
        $commande->update(['statut' => $request->statut]);
    
        if ($request->statut === 'prete') {
            Mail::to($commande->client->email)->send(new CommandePreteMail($commande));
            return redirect()->back()->with('success', 'Email avec facture PDF envoyé.');
        }
        
        return redirect()->back()->with('success', 'Statut changer avec succès');
    }
    
    

}
