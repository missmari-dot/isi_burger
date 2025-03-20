@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Ajouter un Burger</h2>
        </div>
        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('burgers.update', $burger) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom', $burger->nom) }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Prix</label>
                    <input type="number" name="prix" class="form-control" value="{{ old('prix', $burger->prix) }}" required>
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($burger->image)
                        <img src="{{ asset('storage/'.$burger->image) }}" alt="Burger Image" width="100">
                    @endif
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $burger->description) }}</textarea>
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock', $burger->stock) }}" required>
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
            
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </form>

        </div>
    </div>
</div>
@endsection


