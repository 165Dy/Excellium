<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuditController;
use App\Http\Controllers\ComptaController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\FiscalController;

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


Route::get('/Dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    
    
    Route::get('/users/index',function () { return view('Admin.users.index'); } )->name('users.index');
    Route::get('/users/show',function () { return view('Admin.users.show'); } )->name('users.show');

    // FORMATIONS

    // Routes Audit
    Route::get('/admin/formations/audit', [AuditController::class, 'index'])->name('audit.index');
    Route::get('/admin/formations/audit/create', [AuditController::class, 'create'])->name('audit.create');
    Route::post('/admin/formations/audit', [AuditController::class, 'store'])->name('audit.store');
    Route::get('/admin/formations/audit/{id}', [AuditController::class, 'show'])->name('audit.show');
    Route::get('/admin/formations/audit/{id}/edit', [AuditController::class, 'edit'])->name('audit.edit');
    Route::post('/admin/formations/audit/{id}', [AuditController::class, 'update'])->name('audit.update');
    Route::post('/admin/formations/audit/{id}/delete', [AuditController::class, 'destroy'])->name('audit.destroy');

    // Routes Compta
    Route::get('/admin/formations/compta', [ComptaController::class, 'index'])->name('compta.index');
    Route::get('/admin/formations/compta/create', [ComptaController::class, 'create'])->name('compta.create');
    Route::post('/admin/formations/compta', [ComptaController::class, 'store'])->name('compta.store');
    Route::get('/admin/formations/compta/{id}', [ComptaController::class, 'show'])->name('compta.show');
    Route::get('/admin/formations/compta/{id}/edit', [ComptaController::class, 'edit'])->name('compta.edit');
    Route::post('/admin/formations/compta/{id}', [ComptaController::class, 'update'])->name('compta.update');
    Route::post('/admin/formations/compta/{id}/delete', [ComptaController::class, 'destroy'])->name('compta.destroy');

    // Routes Entreprise
    Route::get('/admin/formations/entreprise', [EntrepriseController::class, 'index'])->name('entreprise.index');
    Route::get('/admin/formations/entreprise/create', [EntrepriseController::class, 'create'])->name('entreprise.create');
    Route::post('/admin/formations/entreprise', [EntrepriseController::class, 'store'])->name('entreprise.store');
    Route::get('/admin/formations/entreprise/{id}', [EntrepriseController::class, 'show'])->name('entreprise.show');
    Route::get('/admin/formations/entreprise/{id}/edit', [EntrepriseController::class, 'edit'])->name('entreprise.edit');
    Route::post('/admin/formations/entreprise/{id}', [EntrepriseController::class, 'update'])->name('entreprise.update');
    Route::post('/admin/formations/entreprise/{id}/delete', [EntrepriseController::class, 'destroy'])->name('entreprise.destroy');

    // Routes Fiscal
    Route::get('/admin/formations/fiscal', [FiscalController::class, 'index'])->name('fiscal.index');
    Route::get('/admin/formations/fiscal/create', [FiscalController::class, 'create'])->name('fiscal.create');
    Route::post('/admin/formations/fiscal', [FiscalController::class, 'store'])->name('fiscal.store');
    Route::get('/admin/formations/fiscal/{id}', [FiscalController::class, 'show'])->name('fiscal.show');
    Route::get('/admin/formations/fiscal/{id}/edit', [FiscalController::class, 'edit'])->name('fiscal.edit');
    Route::post('/admin/formations/fiscal/{id}', [FiscalController::class, 'update'])->name('fiscal.update');
    Route::post('/admin/formations/fiscal/{id}/delete', [FiscalController::class, 'destroy'])->name('fiscal.destroy');
    
    //CONTACTS
     Route::get('/Notre_Contacts',function () { return view('clients.Contact'); } )->name('contacts');

     // CALENDRIER
     Route::get('/calendrier/index',function () { return view('Admin.Calendrier.index'); } )->name('calendrier.index');

     // CALENDRIER
     Route::get('/email/index',function () { return view('Admin.Email.index'); } )->name('email.index');

   
