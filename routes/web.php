<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\formationsController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OpportuniteController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/locale/{lang}',[LocaleController::class,'setLocale'])->name('locale.switch');
Route::get('/', [ProduitController::class, 'index'])->name('welcome');



Route::post('/inscription', [InscriptionController::class, 'inscriptionAjax'])->name('inscription.ajax');

Route::post('/choix-produit', [InscriptionController::class, 'saveProduits'])->name('choix-produit');

///////////////////////////////AUTHENTIFICATION////////////////////////////////////////////////////////////////////////////////////

Route::get('/login', function () {return view('auth.login');})->name('login');

Route::get('/register', function () {return view('auth.register');})->name('register');

Route::get('/forgot-password', function () {return view('auth.forgot-password');})->name('forgot-password');

Route::get('/reset-password', function () {return view('auth.reset-password');})->name('reset-password');

Route::get('/confirm-password', function () {return view('auth.confirm-password');})->name('confirm-password');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('clients')->group(function () {

    
    // OPPORTUNITES
    Route::get('opportunites', [OpportuniteController::class, 'index_public'])->name('opportunites.clients.index');
    Route::get('/opportunites/clients/show/{opportnuite}', [OpportuniteController::class, 'show_public'])->name('opportunites.clients.show');
    Route::post('/candidature/postuler', [OpportuniteController::class, 'postuler'])->name('candidature.postuler');
    
    // FORMATIONS
    Route::get('/Formations',[formationsController::class, 'index_public'])->name('Formations.index');
    Route::get('/Formations/show/{id}',[formationsController::class, 'show_public'] )->name('Formations.show_public');
    Route::post('/Formations/participer', [formationsController::class, 'participer'])->name('formations.participer');

    // NOS SERVICES
    Route::get('/Nos_Services/audit&Conseil',function () { return view('clients.Nos_Services.Audit_Conseil'); } )->name('audit&Conseil');
    Route::get('/Nos_Services/Compta_Fiscale',function () { return view('clients.Nos_Services.compta_Fiscale'); } )->name('Compta_Fiscale');
    Route::get('/Nos_Services/Financement',function () { return view('clients.Nos_Services.Financement'); } )->name('Financement');
    Route::get('/Nos_Services/Gestion_paie',function () { return view('clients.Nos_Services.Gestion_Paie'); } )->name('Gestion_Paie');
    Route::get('/Nos_Services/Ressources_Humaines',function () { return view('clients.Nos_Services.Ressource_humaine'); } )->name('Ressources_humaines');
    Route::post('/inscription/services', [ServiceController::class, 'inscriptionAjax'])->name('inscription.services');


     // NOS PARTENAIRES
     Route::get('/Partenaires',function () { return view('clients.Partenaires.index'); } )->name('Partenaires.Collaborateurs');
     Route::get('/Partenaires/show',function () { return view('clients.Partenaires.show'); } )->name('Partenaires.show');

     // RESSOURCES
     Route::get('/Ressources/Articles',function () { return view('clients.Ressources.Articles'); } )->name('Ressources.Articles');
     Route::get('/Ressources/Conseils&Actualites',function () { return view('clients.Ressources.Conseils_Actualites'); } )->name('Ressources.conseils_actualites');
     Route::get('/Ressources/Service_divers',function () { return view('clients.Ressources.service_divers'); } )->name('Ressources.service_divers');
     Route::get('/Ressources/Commerce',function () { return view('clients.Ressources.commerce'); } )->name('Ressources.commerce');
      Route::get('/Ressources/Achats&Location',function () { return view('clients.Ressources.Achat_location'); } )->name('Ressources.achat_location');
     //CONTACTS
     Route::get('/Notre_Contacts',function () { return view('clients.Contact'); } )->name('contacts');

   
});


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::prefix('admin')->group(function () {  
    
    Route::get('/Dashboard', [DashboardController::class, 'index_admin'])->name('dashboard');

    
    Route::get('/users/index',[DashboardController::class, 'index_user'] )->name('users.index');
    Route::get('/users/show',function () { return view('Admin.users.show'); } )->name('users.show');

    // FORMATIONS
    Route::get('/categories/index',function () { return view('Admin.categorie.index'); } )->name('categories.index');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
    Route::get('/categories/list', [CategorieController::class, 'list'])->name('categories.list');
    Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');
    // Routes formations
    Route::post('/formations/store', [formationsController::class, 'store'])->name('formations.store');
    Route::get('/formations/{id}', [formationsController::class, 'show'])->name('formations.show');
    Route::get('/formations/{id}/edit', [formationsController::class, 'edit'])->name('formations.edit');
    Route::match(['PUT', 'POST'], '/formations/{id}', [formationsController::class, 'update'])->name('formations.update');
    Route::delete('/formations/{id}', [formationsController::class, 'destroy'])->name('formations.destroy');
    Route::get('formations/{formation}/details', [formationsController::class, 'getDetails'])->name('formations.details');
    Route::get('formations/{formation}/export-inscriptions', [formationsController::class, 'exportInscriptions'])->name('formations.export-inscriptions');
    Route::patch('inscriptions/{inscription}/statut', [formationsController::class, 'changerStatutInscription'])->name('inscriptions.statut');

    // Routes Opportunités
    Route::get('opportunites', [OpportuniteController::class, 'index'])->name('opportunites.index');
    Route::get('opportunites/candidatures', [OpportuniteController::class, 'candidats'])->name('opportunites.candidatures.index');
    Route::get('opportunites/create', [OpportuniteController::class, 'create'])->name('admin.opportunites.create');
    Route::post('opportunites', [OpportuniteController::class, 'store'])->name('admin.opportunites.store');
    Route::get('opportunites/{opportunite}', [OpportuniteController::class, 'show'])->name('admin.opportunites.show');
    Route::get('opportunites/{opportunite}/edit', [OpportuniteController::class, 'edit'])->name('admin.opportunites.edit');
    Route::put('opportunites/{opportunite}', [OpportuniteController::class, 'update'])->name('admin.opportunites.update');
    Route::delete('opportunites/{opportunite}', [OpportuniteController::class, 'destroy'])->name('admin.opportunites.destroy');
    
    
    Route::get('opportunites/{opportunite}/details', [OpportuniteController::class, 'getDetails'])->name('admin.opportunites.details');
    Route::patch('candidatures/{candidature}/statut', [OpportuniteController::class, 'changerStatutCandidature'])->name('admin.candidatures.statut');
    Route::get('opportunites/{opportunite}/export-candidatures', [OpportuniteController::class, 'exportCandidatures'])->name('opportunites.export-candidatures');
    Route::get('candidatures/{candidature}', [OpportuniteController::class, 'showCandidature'])->name('candidatures.show');


    Route::get('/articles',[DashboardController::class, 'index_articles'] )->name('articles.index');
    Route::get('/partenaires',[DashboardController::class, 'index_partenaires']  )->name('partenaires.index');
    Route::get('/temoignages', [DashboardController::class, 'index_temoignages']  )->name('temoignages.index');
    
    //PRODUITS
    Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
    Route::get('/produits/list', [ProduitController::class, 'list']);
    Route::put('/produits/{id}', [ProduitController::class, 'update']);
    Route::get('/produits/{id}', [ProduitController::class, 'show']);
    Route::delete('/produits/{id}', [ProduitController::class, 'destroy']);

    //SERVICES
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/list', [ServiceController::class, 'list'])->name('services.list');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    //CONTACTS
    // Route::get('/Notre_Contacts',function () { return view('clients.Contact'); } )->name('contacts');

    // CALENDRIER
    Route::get('/calendrier/index',[DashboardController::class, 'index_calendrier'])->name('calendrier.index');

    // CALENDRIER
    Route::get('/email/index',[DashboardController::class, 'index_email'])->name('email.index');

    // ENVOI SERVICES
    Route::post('/envoi-services', [InscriptionController::class, 'envoiServices'])->name('envoi.services');
    Route::post('/inscription/services', [InscriptionController::class, 'saveServices'])->name('inscription.services');

});


