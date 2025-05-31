<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\formationsController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
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



Route::get('/', function () {return view('welcome');})->name('welcome');



Route::post('/inscription', [InscriptionController::class, 'inscriptionAjax'])->name('inscription.ajax');

Route::get('/choix-service', [InscriptionController::class, 'choixService'])->name('service.choix');

///////////////////////////////AUTHENTIFICATION////////////////////////////////////////////////////////////////////////////////////

Route::get('/login', function () {return view('auth.login');})->name('login');

Route::get('/register', function () {return view('auth.register');})->name('register');


Route::get('/forgot-password', function () {return view('auth.forgot-password');})->name('forgot-password');

Route::get('/reset-password', function () {return view('auth.reset-password');})->name('reset-password');

Route::get('/confirm-password', function () {return view('auth.confirm-password');})->name('confirm-password');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('clients')->group(function () {

    
    // ESPACE_CLIENTS
    Route::get('/Espace_clients/documents',function () { return view('clients.Espace_clients.documents'); } )->name('Espace_clients.documents');
    Route::get('/Espace_clients/outils_en_ligne',function () { return view('clients.Espace_clients.outils'); } )->name('Espace_clients.outils');

    // FORMATIONS
    
    Route::get('/Formations/audit',function () { return view('clients.Formations.Audit'); } )->name('Formations.audit');
    Route::get('/Formations/Compta',function () { return view('clients.Formations.Compta'); } )->name('Formations.Compta');
    Route::get('/Formations/Fiscalite',function () { return view('clients.Formations.Fiscalite'); } )->name('Formations.Fiscalite');
    Route::get('/Formations/Gestion_entreprise',function () { return view('clients.Formations.Gestion_entreprise'); } )->name('Formations.Gestion_entreprise');
    Route::get('/Formations/show',function () { return view('clients.Formations.showFormation'); } )->name('Formations.show');

    // NOS SERVICES
    Route::get('/Nos_Services/audit&Conseil',function () { return view('clients.Nos_Services.Audit_Conseil'); } )->name('audit&Conseil');
    Route::get('/Nos_Services/Compta_Fiscale',function () { return view('clients.Nos_Services.compta_Fiscale'); } )->name('Compta_Fiscale');
    Route::get('/Nos_Services/Financement',function () { return view('clients.Nos_Services.Financement'); } )->name('Financement');
    Route::get('/Nos_Services/Gestion_paie',function () { return view('clients.Nos_Services.Gestion_Paie'); } )->name('Gestion_Paie');
    Route::get('/Nos_Services/Ressources_Humaines',function () { return view('clients.Nos_Services.Ressource_humaine'); } )->name('Ressources_humaines');

     // NOS PARTENAIRES
     Route::get('/Partenaires/Nos_collaborateurs',function () { return view('clients.Partenaires.Collaborateurs'); } )->name('Partenaires.Collaborateurs');
     Route::get('/Partenaires/Nos_Entreprises',function () { return view('clients.Partenaires.Entreprises'); } )->name('Partenaires.Entreprises');
     Route::get('/Partenaires/show',function () { return view('clients.Partenaires.showPartenaire'); } )->name('Partenaires.show');

     // RESSOURCES
     Route::get('/Ressources/Articles',function () { return view('clients.Ressources.Articles'); } )->name('Ressources.Articles');
     Route::get('/Ressources/Conseils&Actualites',function () { return view('clients.Ressources.Conseils_Actualites'); } )->name('Ressources.conseils_actualites');
     Route::get('/Ressources/Entrepreunariats',function () { return view('clients.Ressources.Entrepreunariat'); } )->name('Ressources.Entrepreunariat');
    
     //CONTACTS
     Route::get('/Notre_Contacts',function () { return view('clients.Contact'); } )->name('contacts');

   
});


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::prefix('admin')->group(function () {  
    
    Route::get('/Dashboard', [DashboardController::class, 'index_admin'])->name('dashboard');

    
    Route::get('/users/index',function () { return view('Admin.users.index'); } )->name('users.index');
    Route::get('/users/show',function () { return view('Admin.users.show'); } )->name('users.show');

    // FORMATIONS
    Route::get('/categories/index',function () { return view('Admin.categorie.index'); } )->name('categories.index');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');

    // Routes formations
    Route::get('/formations/index', [formationsController::class, 'index'])->name('formations.index');
    Route::get('/formations/create', [formationsController::class, 'create'])->name('formations.create');
    Route::post('/formations/store', [formationsController::class, 'store'])->name('formations.store');
    Route::get('/formations/{id}', [formationsController::class, 'show'])->name('formations.show');
    Route::get('/formations/{id}/edit', [formationsController::class, 'edit'])->name('formations.edit');
    Route::post('/formations/{id}', [formationsController::class, 'update'])->name('formations.update');
    Route::delete('/formations/{id}', [formationsController::class, 'destroy'])->name('formations.destroy');

    Route::get('/articles',function () { return view('Admin.Divers.Articles_index'); } )->name('articles.index');
    Route::get('/partenaires',function () { return view('Admin.Divers.partenaire_index'); } )->name('partenaires.index');
    Route::get('/temoignages',function () { return view('Admin.Divers.Temoignage_index'); } )->name('temoignages.index');
    ////////
    Route::get('/opportunites',function () { return view('Admin.Opportunites.index'); } )->name('opportunites.index');
    //CONTACTS
    Route::get('/Notre_Contacts',function () { return view('clients.Contact'); } )->name('contacts');

    // CALENDRIER
    Route::get('/calendrier/index',function () { return view('Admin.Calendrier.index'); } )->name('calendrier.index');

    // CALENDRIER
    Route::get('/email/index',function () { return view('Admin.Email.index'); } )->name('email.index');

    // ENVOI SERVICES
    Route::post('/envoi-services', [InscriptionController::class, 'envoiServices'])->name('envoi.services');

   
});