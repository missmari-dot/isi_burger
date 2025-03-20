@extends('layouts.app')

@section('content')
    <div class="container">
       
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <h2>Liste des catégories</h2>
                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>
            </div>

            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->nom }}</td>
                                <td>{{ $categorie->description }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette catégorie ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>


    </div>
@endsection
