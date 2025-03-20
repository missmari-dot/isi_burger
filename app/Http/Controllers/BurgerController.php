<?php
namespace App\Http\Controllers;

use App\Models\Burger;
use App\Models\Categorie;
use Illuminate\Http\Request;

class BurgerController extends Controller
{
    public function index()
    {
        $burgers = Burger::all();
        return view('burgers.index', compact('burgers'));
    }
    public function catalogue(Request $request)
    {
        $query = Burger::where('stock', '>', 0); // Afficher uniquement les burgers en stock
    
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('prix', '>=', $request->min_price);
        }
    
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('prix', '<=', $request->max_price);
        }
    
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
    
        $burgers = $query->get();
    
        return view('burgers.catalogue', compact('burgers'));
    }
    


    public function create()
    {
        $categories = Categorie::all();

        return view('burgers.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required'
        ]);
    
        $burger = new Burger($request->all());
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $burger->image = $path;
        }
    
        $burger->save();
    
        return redirect()->route('burgers.index')->with('success', 'Burger ajouté avec succès.');
    }
    

    public function show(Burger $burger)
    {
        return view('burgers.show', compact('burger'));
    }

    public function edit(Burger $burger)
    {
        $categories = Categorie::all();
        return view('burgers.edit', compact('burger', 'categories'));
    }

    public function update(Request $request, Burger $burger)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required'
        ]);

        $burger->update($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $burger->image = $path;
        }

        return redirect()->route('burgers.index')->with('success', 'Burger mis à jour.');
    }

    public function destroy(Burger $burger)
    {
        $burger->delete();
        return redirect()->route('burgers.index')->with('success', 'Burger supprimé.');
    }
}
