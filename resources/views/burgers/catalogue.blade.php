@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Catalogue des Burgers</h2>

    <form action="{{ route('catalogue') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Rechercher un burger..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <input type="number" name="min_price" class="form-control" placeholder="Prix min" value="{{ request('min_price') }}">
            </div>
            <div class="col-md-3">
                <input type="number" name="max_price" class="form-control" placeholder="Prix max" value="{{ request('max_price') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach($burgers as $burger)
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="{{ asset('storage/'.$burger->image) }}" class="card-img-top" alt="{{ $burger->nom }}" height="200px">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $burger->nom }}</h5>
                        <p class="card-text">{{ $burger->categorie->nom ?? 'Non défini' }}</p>
                        <p class="card-text"><strong>{{ $burger->prix }} f</strong></p>
                        @if($burger->enStock())
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#burgerModal"
                                    data-burger-id="{{ $burger->id }}"
                                    data-burger-name="{{ $burger->nom }}"
                                    data-burger-description="{{ $burger->description }}"
                                    data-burger-price="{{ $burger->prix }}"
                                    data-burger-image="{{ asset('storage/'.$burger->image) }}">
                                Commander
                            </button>
                        @else
                            <button class="btn btn-secondary" disabled>Rupture</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal pour les détails du burger -->
<div class="modal fade" id="burgerModal" tabindex="-1" aria-labelledby="burgerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="burgerModalLabel">Détails du Burger</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="burgerImage" src="" class="img-fluid rounded" alt="Burger Image">
                    </div>
                    <div class="col-md-6">
                        <h2 id="burgerName"></h2>
                        <p id="burgerDescription" class="lead"></p>
                        <p id="burgerPrice" class="h3 text-success"></p>
                        <form id="orderForm" action="{{ route('commandes.commander') }}" method="POST">
                            @csrf
                            <input type="hidden" name="burger_id" id="burgerId">
                            <div class="mb-3">
                                <label for="quantite" class="form-label">Quantité :</label>
                                <input type="number" name="quantite" id="quantite" class="form-control" value="1" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Commander</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const burgerModal = document.getElementById('burgerModal');
        burgerModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Bouton qui a déclenché la modal
            const burgerId = button.getAttribute('data-burger-id');
            const burgerName = button.getAttribute('data-burger-name');
            const burgerDescription = button.getAttribute('data-burger-description');
            const burgerPrice = button.getAttribute('data-burger-price');
            const burgerImage = button.getAttribute('data-burger-image');

            // Mettre à jour les éléments de la modal
            document.getElementById('burgerName').textContent = burgerName;
            document.getElementById('burgerDescription').textContent = burgerDescription;
            document.getElementById('burgerPrice').textContent = burgerPrice + ' f';
            document.getElementById('burgerImage').src = burgerImage;
            document.getElementById('burgerId').value = burgerId;
        });
    });
</script>
@endsection