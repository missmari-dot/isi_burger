<?php

namespace App\Http\Controllers;

use App\Models\Burger;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    

    public function index()
    {
        $burgers = Burger::all();
        return view('welcome', compact('burgers'));
    }
    
    public function dashboard()
    {
        $aujourdHui = Carbon::today();

        $commandesEnCours = DB::table('commandes')
            ->whereIn('statut', ['en_attente', 'en_preparation'])
            ->whereDate('created_at', $aujourdHui)
            ->count();

        $commandesValidees = DB::table('commandes')
            ->where('statut', 'payee')
            ->whereDate('created_at', $aujourdHui)
            ->count();

        $recettesJournalieres = DB::table('paiements')
            ->whereDate('created_at', $aujourdHui)
            ->sum('montant');

        $commandesParMois = DB::table('commandes')
            ->select(DB::raw('MONTH(created_at) as mois'), DB::raw('COUNT(*) as total'))
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        $produitsParCategorieParMois = DB::table('burgers')
            ->join('categories', 'burgers.categorie_id', '=', 'categories.id')
            ->join('commande_burger', 'burgers.id', '=', 'commande_burger.burger_id') // Correction ici
            ->join('commandes', 'commande_burger.commande_id', '=', 'commandes.id') // Correction ici
            ->select(DB::raw('MONTH(commandes.created_at) as mois'), 'categories.nom as categorie', DB::raw('COUNT(burgers.id) as total'))
            ->groupBy('mois', 'categories.nom')
            ->orderBy('mois')
            ->get();
    
        return view('dashboard', compact(
            'commandesEnCours',
            'commandesValidees',
            'recettesJournalieres',
            'commandesParMois',
            'produitsParCategorieParMois'
        ));
    }

}
