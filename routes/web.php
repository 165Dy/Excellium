<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;


use App\Http\Controllers\formationsController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\OpportuniteController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ActualiteController;
use App\Models\Service;

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
// Route vers la page d'accueil avec le ticker
// Route::get('/', [ActualiteController::class, 'index'])->name('welcome');




Route::post('/inscription', [InscriptionController::class, 'inscriptionAjax'])->name('inscription.ajax');
Route::post('/inscription/services', [ServiceController::class, 'inscriptionAjax'])->name('inscription.services');

Route::post('/choix-produit', [InscriptionController::class, 'saveProduits'])->name('choix-produit');

///////////////////////////////AUTHENTIFICATION////////////////////////////////////////////////////////////////////////////////////

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\InvitationController;

// Routes d'authentification pour les administrateurs seulement
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
    
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Route de déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::prefix('clients')->group(function () {

    
    // OPPORTUNITES
    Route::get('emplois', [EmploiController::class, 'index_public'])->name('emplois.clients.index');
    Route::get('/emplois/clients/show/{opportnuite}', [EmploiController::class, 'show_public'])->name('emplois.clients.show');
    Route::post('/candidature/postuler', [EmploiController::class, 'postuler'])->name('candidature.postuler');
    
    // FORMATIONS
    Route::get('/Formations',[formationsController::class, 'index_public'])->name('Formations.index');
    Route::get('/Formations/show/{id}',[formationsController::class, 'show_public'] )->name('Formations.show_public');
    Route::post('/Formations/participer', [formationsController::class, 'participer'])->name('formations.participer');

    // NOS SERVICES

    Route::get('/Nos_Services/fsdgsexxdzs/{slug}',[ServiceController::class, 'showClient'] )->name('services_client.show');
    


    // NOS PARTENAIRES
    Route::get('/Partenaires',function () { return view('clients.Partenaires.index'); } )->name('Partenaires.Collaborateurs');
    Route::get('/Partenaires/show',function () { return view('clients.Partenaires.show'); } )->name('Partenaires.show');

    // Opportunites
    Route::get('/Opportunites/Articles',function () { return view('clients.Opportunites.Articles'); } )->name('Opportunites.Articles');
    Route::get('/Opportunites/Conseils&Actualites',function () { return view('clients.Opportunites.Conseils_Actualites'); } )->name('Opportunites.conseils_actualites');
    Route::get('/Opportunites/Service_divers',function () { return view('clients.Opportunites.service_divers'); } )->name('Opportunites.service_divers');
    Route::get('/Opportunites/Commerce',function () { return view('clients.Opportunites.commerce'); } )->name('Opportunites.commerce');
    Route::get('/Opportunites/Achats&Location',function () { return view('clients.Opportunites.Achat_location'); } )->name('Opportunites.achat_location');
    
    // Opportunités d'affaire publiques
    Route::get('/business/Opportunites', [OpportuniteController::class, 'index_public'])->name('opportunites.index_public');
    Route::get('/business/Opportunites/{slug}', [OpportuniteController::class, 'show_public'])->name('opportunites.show_public');
    Route::post('/business/Opportunites/candidature', [OpportuniteController::class, 'candidature'])->name('opportunites.candidature');
    //CONTACTS
    Route::get('/Notre_Contacts',function () { return view('clients.Contact'); } )->name('contacts');

   
});


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Routes d'invitations pour les super_admin
Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/invitations', [InvitationController::class, 'index'])->name('admin.invitations.index');
    Route::post('/admin/invitations', [InvitationController::class, 'sendInvitation'])->name('admin.invitations.send');
    Route::patch('/admin/invitations/{id}/revoke', [InvitationController::class, 'revokeInvitation'])->name('admin.invitations.revoke');
    Route::patch('/admin/invitations/{id}/resend', [InvitationController::class, 'resendInvitation'])->name('admin.invitations.resend');
});

Route::prefix('admin')->middleware('admin.auth')->group(function () {  
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
    Route::get('emplois', [EmploiController::class, 'index'])->name('emplois.index');
    Route::get('emplois/candidatures', [EmploiController::class, 'candidats'])->name('emplois.candidatures.index');
    Route::get('emplois/create', [EmploiController::class, 'create'])->name('admin.emplois.create');
    Route::post('emplois', [EmploiController::class, 'store'])->name('admin.emplois.store');
    Route::get('emplois/{emploi}', [EmploiController::class, 'show'])->name('admin.emplois.show');
    Route::get('emplois/{emploi}/edit', [EmploiController::class, 'edit'])->name('admin.emplois.edit');
    Route::put('emplois/{emploi}', [EmploiController::class, 'update'])->name('admin.emplois.update');
    Route::delete('emplois/{emploi}', [EmploiController::class, 'destroy'])->name('admin.emplois.destroy');
    
    
    Route::get('emplois/{emploi}/details', [EmploiController::class, 'getDetails'])->name('admin.emplois.details');
    Route::patch('candidatures/{candidature}/statut', [EmploiController::class, 'changerStatutCandidature'])->name('admin.candidatures.statut');
    Route::get('emplois/{emploi}/export-candidatures', [EmploiController::class, 'exportCandidatures'])->name('emplois.export-candidatures');
    Route::get('candidatures/{candidature}', [EmploiController::class, 'showCandidature'])->name('candidatures.show');

    // Routes Opportunités d'affaire
    Route::get('opportunites', [OpportuniteController::class, 'index'])->name('opportunites.index');
    Route::post('opportunites', [OpportuniteController::class, 'store'])->name('opportunites.store');
    Route::get('opportunites/{opportunite}', [OpportuniteController::class, 'show'])->name('opportunites.show');
    Route::get('opportunites/{opportunite}/edit', [OpportuniteController::class, 'edit'])->name('opportunites.edit');
    Route::put('opportunites/{opportunite}', [OpportuniteController::class, 'update'])->name('opportunites.update');
    Route::delete('opportunites/{opportunite}', [OpportuniteController::class, 'destroy'])->name('opportunites.destroy');
    Route::get('opportunites/{opportunite}/candidats', [OpportuniteController::class, 'getCandidats'])->name('opportunites.candidats');
    Route::patch('postulations/{postulation}/statut', [OpportuniteController::class, 'changerStatutPostulation'])->name('postulations.statut');

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
    Route::get('/services/users-subscriptions', [ServiceController::class, 'listUserServices'])->name('services.users_subscriptions');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    //CONTACTS
    // Route::get('/Notre_Contacts',function () { return view('clients.Contact'); } )->name('contacts');

    // CALENDRIER
    Route::get('/calendrier/index',[DashboardController::class, 'index_calendrier'])->name('calendrier.index');

    // CALENDRIER
    Route::get('/email/index',[DashboardController::class, 'index_email'])->name('email.index');




});

Route::get('/rss', function () {
            $url = "https://news.google.com/rss/search?q=C%C3%B4te+d%27Ivoire&hl=fr&gl=CI&ceid=CI:fr";

            try {
                $response = Http::get($url);

                if ($response->successful()) {
                    return response($response->body(), 200)
                        ->header('Content-Type', 'application/xml')
                        ->header('Access-Control-Allow-Origin', '*');
                } else {
                    return response("Erreur lors du chargement du flux.", 500);
                }
            } catch (\Exception $e) {
                return response("Impossible de contacter la source.", 500);
            }
});
