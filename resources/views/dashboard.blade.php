@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <!-- Commandes en cours -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-primary bubble-shadow-small">
                    <i class="fas fa-hourglass-half"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Commandes en cours</p>
                    <h4 class="card-title">{{ $commandesEnCours }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Commandes validées -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-success bubble-shadow-small">
                    <i class="fas fa-check-circle"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Commandes validées</p>
                    <h4 class="card-title">{{ $commandesValidees }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Recettes journalières -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-info bubble-shadow-small">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Recettes journalières</p>
                    <h4 class="card-title">{{ number_format($recettesJournalieres, 2) }} F</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Nombre de commandes par mois -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-warning bubble-shadow-small">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Commandes par mois</p>
                    <h4 class="card-title">{{ $commandesParMois->sum('total') }}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Graphique Nombre de Produits par Catégorie par Mois -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-round">
            <div class="card-header">
              <h4 class="card-title">Produits par Catégorie par Mois</h4>
            </div>
            <div class="card-body">
              <canvas id="produitsParCategorieChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          var ctx = document.getElementById("produitsParCategorieChart").getContext("2d");
      
          var data = {
            labels: @json($produitsParCategorieParMois->pluck('mois')),
            datasets: [
              @foreach($produitsParCategorieParMois->groupBy('categorie') as $categorie => $data)
              {
                label: "{{ $categorie }}",
                data: @json($data->pluck('total')),
                backgroundColor: getRandomColor(),
              },
              @endforeach
            ]
          };
      
          new Chart(ctx, {
            type: "bar",
            data: data,
            options: {
              responsive: true,
              scales: {
                y: { beginAtZero: true }
              }
            }
          });
      
          function getRandomColor() {
            var letters = "0123456789ABCDEF";
            var color = "#";
            for (var i = 0; i < 6; i++) {
              color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
          }
        });
    </script>
      

</div>

@endsection
