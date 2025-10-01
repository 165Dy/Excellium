<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

// Controllers
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
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\InvitationController;
use App\Http\Controllers\AssistanceComptableController;
use App\Http\Controllers\EntrepriseController;

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

// ========================================
// ROUTES GÉNÉRALES
// ========================================

// Localisation
Route::get('/locale/{lang}', [LocaleController::class, 'setLocale'])->name('locale.switch');

// Page d'accueil
Route::get('/', [ProduitController::class, 'index'])->name('welcome');

// Inscriptions Ajax
Route::post('/inscription', [InscriptionController::class, 'inscriptionAjax'])->name('inscription.ajax');
Route::post('/inscription/services', [ServiceController::class, 'inscriptionAjax'])->name('inscription.services');
Route::post('/choix-produit', [InscriptionController::class, 'saveProduits'])->name('choix-produit');

// RSS Feed
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

// ========================================
// ROUTES D'AUTHENTIFICATION
// ========================================

Route::middleware('guest')->group(function () {
    // Connexion
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Inscription (avec invitation uniquement)
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    // Mot de passe oublié
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
    
    // Réinitialisation de mot de passe
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ========================================
// ROUTES PUBLIQUES CLIENTS
// ========================================

Route::prefix('clients')->name('clients.')->group(function () {
    
    // EMPLOIS & OPPORTUNITÉS D'EMPLOI
    Route::prefix('emplois')->name('emplois.')->group(function () {
        Route::get('/', [EmploiController::class, 'index_public'])->name('index');
        Route::get('/show/{opportnuite}', [EmploiController::class, 'show_public'])->name('show');
        Route::post('/candidature/postuler', [EmploiController::class, 'postuler'])->name('postuler');
    });
    
    // FORMATIONS
    Route::prefix('formations')->name('formations.')->group(function () {
        Route::get('/index', [formationsController::class, 'index_public'])->name('index');
        Route::get('/show/{id}', [formationsController::class, 'show_public'])->name('show');
        Route::post('/participer', [formationsController::class, 'participer'])->name('participer');
    });
    
    // SERVICES
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/{slug}', [ServiceController::class, 'showClient'])->name('show');
    });
    
    // PARTENAIRES
    Route::prefix('partenaires')->name('partenaires.')->group(function () {
        Route::get('/', function () { return view('clients.Partenaires.index'); })->name('index');
        Route::get('/show', function () { return view('clients.Partenaires.show'); })->name('show');
    });
    
    // OPPORTUNITÉS D'AFFAIRES
    Route::prefix('opportunites')->name('opportunites.')->group(function () {
        // Pages statiques
        Route::get('/articles', function () { return view('clients.Opportunites.Articles'); })->name('articles');
        Route::get('/conseils-actualites', function () { return view('clients.Opportunites.Conseils_Actualites'); })->name('conseils_actualites');
        Route::get('/services-divers', function () { return view('clients.Opportunites.service_divers'); })->name('service_divers');
        Route::get('/commerce', function () { return view('clients.Opportunites.commerce'); })->name('commerce');
        Route::get('/achats-location', function () { return view('clients.Opportunites.Achat_location'); })->name('achat_location');
        
        // Opportunités dynamiques
        Route::get('/business', [OpportuniteController::class, 'index_public'])->name('business.index');
        Route::get('/business/{slug}', [OpportuniteController::class, 'show_public'])->name('business.show');
        Route::post('/business/candidature', [OpportuniteController::class, 'candidature'])->name('business.candidature');
    });
    
    // CONTACT
    Route::get('/contact', function () { return view('clients.Contact'); })->name('contact');
});

// ========================================
// ROUTES D'ADMINISTRATION
// ========================================

Route::middleware('admin.auth')->prefix('admin')->name('admin.')->group(function () {
    
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index_admin'])->name('dashboard');
    
    // GESTION DES UTILISATEURS
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [DashboardController::class, 'index_user'])->name('index');
        Route::get('/show', function () { return view('Admin.users.show'); })->name('show');
    });
    
    // GESTION DES INVITATIONS
    Route::prefix('invitations')->name('invitations.')->group(function () {
        Route::get('/', [InvitationController::class, 'index'])->name('index');
        Route::post('/', [InvitationController::class, 'sendInvitation'])->name('send');
        Route::patch('/{id}/revoke', [InvitationController::class, 'revokeInvitation'])->name('revoke');
        Route::patch('/{id}/resend', [InvitationController::class, 'resendInvitation'])->name('resend');
    });
    
    // GESTION DES CATÉGORIES
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', function () { return view('Admin.categorie.index'); })->name('index');
        Route::post('/', [CategorieController::class, 'store'])->name('store');
        Route::get('/list', [CategorieController::class, 'list'])->name('list');
        Route::put('/{id}', [CategorieController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategorieController::class, 'destroy'])->name('destroy');
    });
    
    // GESTION DES FORMATIONS
    Route::prefix('formations')->name('formations.')->group(function () {
        Route::post('/store', [formationsController::class, 'store'])->name('store');
        Route::get('/{id}', [formationsController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [formationsController::class, 'edit'])->name('edit');
        Route::match(['PUT', 'POST'], '/{id}', [formationsController::class, 'update'])->name('update');
        Route::delete('/{id}', [formationsController::class, 'destroy'])->name('destroy');
        Route::get('/{formation}/details', [formationsController::class, 'getDetails'])->name('details');
        Route::get('/{formation}/export-inscriptions', [formationsController::class, 'exportInscriptions'])->name('export_inscriptions');
    });
    
    // GESTION DES INSCRIPTIONS FORMATIONS
    Route::prefix('inscriptions')->name('inscriptions.')->group(function () {
        Route::patch('/{inscription}/statut', [formationsController::class, 'changerStatutInscription'])->name('statut');
    });
    
    // GESTION DES EMPLOIS
    Route::prefix('emplois')->name('emplois.')->group(function () {
        Route::get('/', [EmploiController::class, 'index'])->name('index');
        Route::get('/candidatures', [EmploiController::class, 'candidats'])->name('candidatures.index');
        Route::get('/create', [EmploiController::class, 'create'])->name('create');
        Route::post('/', [EmploiController::class, 'store'])->name('store');
        Route::get('/{emploi}', [EmploiController::class, 'show'])->name('show');
        Route::get('/{emploi}/edit', [EmploiController::class, 'edit'])->name('edit');
        Route::put('/{emploi}', [EmploiController::class, 'update'])->name('update');
        Route::delete('/{emploi}', [EmploiController::class, 'destroy'])->name('destroy');
        Route::get('/{emploi}/details', [EmploiController::class, 'getDetails'])->name('details');
        Route::get('/{emploi}/export-candidatures', [EmploiController::class, 'exportCandidatures'])->name('export_candidatures');
    });
    
    // GESTION DES CANDIDATURES
    Route::prefix('candidatures')->name('candidatures.')->group(function () {
        Route::get('/{candidature}', [EmploiController::class, 'showCandidature'])->name('show');
        Route::patch('/{candidature}/statut', [EmploiController::class, 'changerStatutCandidature'])->name('statut');
    });
    
    // GESTION DES OPPORTUNITÉS D'AFFAIRES
    Route::prefix('opportunites')->name('opportunites.')->group(function () {
        Route::get('/', [OpportuniteController::class, 'index'])->name('index');
        Route::post('/', [OpportuniteController::class, 'store'])->name('store');
        Route::get('/{opportunite}', [OpportuniteController::class, 'show'])->name('show');
        Route::get('/{opportunite}/edit', [OpportuniteController::class, 'edit'])->name('edit');
        Route::put('/{opportunite}', [OpportuniteController::class, 'update'])->name('update');
        Route::delete('/{opportunite}', [OpportuniteController::class, 'destroy'])->name('destroy');
        Route::get('/{opportunite}/candidats', [OpportuniteController::class, 'getCandidats'])->name('candidats');
    });
    
    // GESTION DES POSTULATIONS
    Route::prefix('postulations')->name('postulations.')->group(function () {
        Route::patch('/{postulation}/statut', [OpportuniteController::class, 'changerStatutPostulation'])->name('statut');
    });
    
    // GESTION DES PRODUITS
    Route::prefix('produits')->name('produits.')->group(function () {
        Route::post('/', [ProduitController::class, 'store'])->name('store');
        Route::get('/list', [ProduitController::class, 'list'])->name('list');
        Route::get('/{id}', [ProduitController::class, 'show'])->name('show');
        Route::put('/{id}', [ProduitController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProduitController::class, 'destroy'])->name('destroy');
    });
    
    // GESTION DES SERVICES
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::post('/', [ServiceController::class, 'store'])->name('store');
        Route::get('/list', [ServiceController::class, 'list'])->name('list');
        Route::get('/users-subscriptions', [ServiceController::class, 'listUserServices'])->name('users_subscriptions');
        Route::get('/{id}', [ServiceController::class, 'show'])->name('show');
        Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });
    
    // GESTION DES ENTREPRISES
    Route::prefix('entreprises')->name('entreprises.')->group(function () {
        Route::get('/', [EntrepriseController::class, 'index'])->name('index');
        Route::get('/create', [EntrepriseController::class, 'create'])->name('create');
        Route::post('/', [EntrepriseController::class, 'store'])->name('store');
        Route::get('/{entreprise}', [EntrepriseController::class, 'show'])->name('show');
        Route::get('/{entreprise}/edit', [EntrepriseController::class, 'edit'])->name('edit');
        Route::put('/{entreprise}', [EntrepriseController::class, 'update'])->name('update');
        Route::delete('/{entreprise}', [EntrepriseController::class, 'destroy'])->name('destroy');
        Route::post('/{entreprise}/assistance', [EntrepriseController::class, 'createAssistance'])->name('create_assistance');
        Route::patch('/{entreprise}/toggle-assist', [EntrepriseController::class, 'toggleAssist'])->name('toggle_assist');
        Route::get('/{entreprise}/stats', [EntrepriseController::class, 'getStats'])->name('stats');
    });
    
    // GESTION DES ASSISTANCES COMPTABLES ENTREPRISES
    Route::prefix('assistance-comptable')->name('assistance_comptable.')->group(function () {
        Route::get('/', [AssistanceComptableController::class, 'index'])->name('index');
        Route::get('/create', [AssistanceComptableController::class, 'create'])->name('create');
        Route::post('/', [AssistanceComptableController::class, 'store'])->name('store');
        Route::get('/{assistance}', [AssistanceComptableController::class, 'show'])->name('show');
        Route::get('/{assistance}/edit', [AssistanceComptableController::class, 'edit'])->name('edit');
        Route::put('/{assistance}', [AssistanceComptableController::class, 'update'])->name('update');
        Route::delete('/{assistance}', [AssistanceComptableController::class, 'destroy'])->name('destroy');
        Route::patch('/{assistance}/statut', [AssistanceComptableController::class, 'updateStatut'])->name('update_statut');
        Route::get('/entreprise/{entreprise}', [AssistanceComptableController::class, 'getByEntreprise'])->name('by_entreprise');
        Route::get('/admin/{user}', [AssistanceComptableController::class, 'getByAdmin'])->name('by_admin');
    });
    
    // CONTENU ÉDITORIAL
    Route::get('/articles', [DashboardController::class, 'index_articles'])->name('articles.index');
    Route::get('/partenaires', [DashboardController::class, 'index_partenaires'])->name('partenaires.index');
    Route::get('/temoignages', [DashboardController::class, 'index_temoignages'])->name('temoignages.index');
    
    // OUTILS
    Route::get('/calendrier', [DashboardController::class, 'index_calendrier'])->name('calendrier.index');
    Route::get('/email', [DashboardController::class, 'index_email'])->name('email.index');
});