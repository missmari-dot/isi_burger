<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Afficher la liste des clients ayant passé des commandes.
     */
    public function index()
    {
        $clients = User::whereHas('commandes')->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Afficher les détails d'un client et ses commandes.
     */
    public function show($id)
    {
        $client = User::with('commandes')->findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Bloquer/Désactiver un client.
     */
    public function toggleStatus($id)
    {
        $client = User::findOrFail($id);
        $client->status = $client->status === 'actif' ? 'inactif' : 'actif';
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Statut du client mis à jour.');
    }
}



