<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::prefix('clients')->group(function () {

    
    // ESPACE_CLIENTS
    Route::get('/Espace_clients/documents',function () { return view('clients.Espace_clients.documents'); } )->name('Espace_clients.documents');
    Route::get('/Espace_clients/outils_en_ligne',function () { return view('clients.Espace_clients.outils'); } )->name('Espace_clients.outils');

    // FORMATIONS
    Route::get('/Formations/Audit',function () { return view('clients.Formations.Audit'); } )->name('Formations.Audit');
    Route::get('/Formations/Compta',function () { return view('clients.Formations.Compta'); } )->name('Formations.Compta');
    Route::get('/Formations/Fiscalite',function () { return view('clients.Formations.Fiscalite'); } )->name('Formations.Fiscalite');
    Route::get('/Formations/Gestion_entreprise',function () { return view('clients.Formations.Gestion_entreprise'); } )->name('Formations.Gestion_entreprise');
    Route::get('/Formations/show',function () { return view('clients.Formations.showFormation'); } )->name('Formations.show');

    // NOS SERVICES
    Route::get('/Nos_Services/Audit&Conseil',function () { return view('clients.Nos_Services.Audit_Conseil'); } )->name('Audit&Conseil');
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