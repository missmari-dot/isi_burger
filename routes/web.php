<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\BurgerController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ProfileController;
use App\Providers\RouteServiceProvider;



Route::get('/', [HomeController::class, 'index'])->name('welcome');


Route::get('/redirect', function () {
    return redirect(RouteServiceProvider::home());
})->middleware(['auth']);


Route::middleware(['auth'])->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware('auth')->group(function () {
        Route::get('/catalogue', [BurgerController::class, 'catalogue'])->name('catalogue');
        
        Route::post('/paiements/{commande}', [PaiementController::class, 'store'])->name('paiements.store')->middleware('auth');
        Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
        Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');
        Route::post('/commandes/commander', [CommandeController::class, 'commander'])->name('commandes.commander');
        Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');
        Route::get('/commandes/{commande}', [CommandeController::class, 'show'])->name('commandes.show');
        Route::get('/burgers/{burger}/detail', [BurgerController::class, 'detail'])->name('burgers.detail');
    });
    
    Route::middleware('role:gestionnaire')->group(function () {
        
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::resource('categories', CategorieController::class);
        Route::resource('burgers', BurgerController::class);
        Route::get('/gestionnaire/commandes', [CommandeController::class, 'indexGestionnaire'])->name('gestionnaire.commandes.index');
        Route::get('/gestionnaire/commandes/{commande}', [CommandeController::class, 'showCommande'])->name('gestionnaire.commandes.show');
        Route::patch('/commandes/{commande}/statut', [CommandeController::class, 'updateStatut'])->name('commandes.updateStatut');
        Route::post('/paiements/{commande}', [PaiementController::class, 'store'])->name('paiements.store');
        Route::delete('/commandes/{commande}/annuler', [CommandeController::class, 'annuler'])->name('commandes.annuler')
            ->middleware('role:gestionnaire');

    });
});

require __DIR__.'/auth.php';
