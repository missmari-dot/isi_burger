@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Liste des Burgers</h4>
                <a href="{{ route('burgers.create') }}" class="btn btn-primary mb-3">Ajouter un Burger</a>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Categorie</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($burgers as $burger)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$burger->image) }}" class="imagecheck-image" alt="{{ $burger->nom }}" height="70" width="70">
                                </td>
                                <td>{{ $burger->nom }}</td>
                                <td>{{ $burger->prix }} f</td>
                                <td>{{ $burger->stock }}</td>
                                <td>{{ $burger->categorie->nom ?? 'Non défini' }}</td>
                                <td>
                                    @if($burger->enStock())
                                        <span class="badge bg-success">En stock</span>
                                    @else
                                        <span class="badge bg-danger">Rupture</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('burgers.edit', $burger) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('burgers.destroy', $burger) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce burger ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- Fin table-responsive -->
            </div> <!-- Fin card-body -->
        </div> <!-- Fin card -->
    </div> <!-- Fin col-md-12 -->
</div> <!-- Fin container -->
@endsection
