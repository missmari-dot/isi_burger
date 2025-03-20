<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture - Commande #{{ $commande->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; font-size: 20px; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid black; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="header">
        <h2>ISI BURGER</h2>
        <p>Facture pour la commande #{{ $commande->id }}</p>
    </div>

    <p><strong>Client :</strong> {{ $commande->client->name }}</p>
    <p><strong>Email :</strong> {{ $commande->client->email }}</p>
    <p><strong>Montant Total :</strong> {{ number_format($commande->montant_total, 2) }} €</p>

    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commande->burgers as $burger)
            <tr>
                <td>{{ $burger->nom }}</td>
                <td>{{ $burger->pivot->quantite }}</td>
                <td>{{ number_format($burger->prix, 2) }} €</td>
                <td>{{ number_format($burger->prix * $burger->pivot->quantite, 2) }} €</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total à payer :</strong> {{ number_format($commande->montant_total, 2) }} €</p>

    <p>Merci pour votre commande chez ISI BURGER ! 🍔</p>
</body>
</html>
