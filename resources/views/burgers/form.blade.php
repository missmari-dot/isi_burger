@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($burger) ? 'Modifier le Burger' : 'Ajouter un Burger' }}</h2>

    <form action="{{ isset($burger) ? route('burgers.update', $burger) : route('burgers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($burger))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $burger->nom ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prix</label>
            <input type="number" name="prix" class="form-control" value="{{ old('prix', $burger->prix ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $burger->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', $burger->stock ?? 0) }}" required>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label fw-bold">Catégorie</label>
            <select class="form-control" id="categorie" name="categorie_id" required>
                <option value="">Sélectionner une catégorie</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id', $produit->categorie_id ?? '') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
