<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Formation;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $formations = Formation::with('categorie')->get();
        $categories = Categorie::all();
        
        // Passer une fonction helper pour l'affichage des fichiers
        view()->share('getFilePreview', function($formation) {
            if (!$formation->file_path) {
                return '<div class="avatar-initial rounded bg-label-secondary"><i class="ri-file-line"></i></div>';
            }
            
            $imagePath = asset('storage/' . $formation->file_path);
            
            if ($formation->file_type === 'image') {
                return '<img src="' . $imagePath . '" alt="Image" class="avatar-img rounded">';
            } else {
                return '<div class="video-thumbnail position-relative">
                            <video class="avatar-img rounded" style="object-fit: cover;">
                                <source src="' . $imagePath . '" type="video/mp4">
                            </video>
                            <div class="play-overlay position-absolute top-50 start-50 translate-middle">
                                <i class="ri-play-fill text-white"></i>
                            </div>
                        </div>';
            }
        });
        return view('layouts.admin', compact('categories', 'formations'));
    }

    public function index_admin()
    {
        // 1️⃣ Récupération des formations et catégories
        $formations = Formation::with('categorie')->get();
        $categories = Categorie::all();

        // 2️⃣ Autres modules
        $emplois = \App\Models\Emploi::all();
        $opportunites = \App\Models\Opportunite::with('categorie')->get();
        $services = class_exists(\App\Models\Service::class) ? \App\Models\Service::all() : collect();
        $produits = class_exists(\App\Models\Produit::class) ? \App\Models\Produit::all() : collect();
        $invitations = \App\Models\AdminInvitation::all();
        $entreprises = \App\Models\Entreprise::all();
        $users = User::all();
        $users_count = $users->count();

        // 3️⃣ Compteurs pour la card "Vue d’ensemble du système"
        $formations_count = $formations->count();
        $emplois_count = $emplois->count();
        $opportunites_count = $opportunites->count();
        $services_count = $services->count();
        $produits_count = $produits->count();
        $categories_count = $categories->count();
        $invitations_count = $invitations->count();
        $entreprises_count = $entreprises->count();

        // 4️⃣ Fonction helper pour prévisualisation des fichiers
        view()->share('getFilePreview', function($formation) {
            if (!$formation->file_path) {
                return '<div class="avatar-initial rounded bg-label-secondary"><i class="ri-file-line"></i></div>';
            }

            $imagePath = asset('storage/' . $formation->file_path);

            if ($formation->file_type === 'image') {
                return '<img src="' . $imagePath . '" alt="Image" class="avatar-img rounded">';
            } else {
                return '<div class="video-thumbnail position-relative">
                            <video class="avatar-img rounded" style="object-fit: cover;">
                                <source src="' . $imagePath . '" type="video/mp4">
                            </video>
                            <div class="play-overlay position-absolute top-50 start-50 translate-middle">
                                <i class="ri-play-fill text-white"></i>
                            </div>
                        </div>';
            }
        });

        // 5️⃣ Retour de la vue avec toutes les données
        return view('dashboard', compact(
            'categories',
            'formations',
            'emplois',
            'opportunites',
            'services',
            'produits',
            'invitations',
            'entreprises',
            'formations_count',
            'emplois_count',
            'opportunites_count',
            'services_count',
            'categories_count',
            'produits_count',
            'invitations_count',
            'entreprises_count',
            'users_count'
        ));
    }



    /* public function index_user()
    {
        $formations = Formation::with('categorie')->get();
        $categories = Categorie::all();
     
        return view('Admin.Divers.Articles_index', compact('categories', 'formations'));
    } */

    public function index_articles()
    {
        $formations = Formation::with('categorie')->get();
        $categories = Categorie::all();
     
        return view('Admin.Divers.Articles_index', compact('categories', 'formations'));
    }

    public function index_calendrier()
    {
        $formations = Formation::with('categorie')->get();
        $categories = Categorie::all();
     
        return view('Admin.Calendrier.index', compact('categories', 'formations'));
    }

    public function index_Temoignages()
    {
        $formations = Formation::with('categorie')->get();
        $categories = Categorie::all();
     
        return view('Admin.Divers.Temoignage_index', compact('categories', 'formations'));
    }
    public function index_partenaires()
    {
        $formations = Formation::with('categorie')->get();
        $categories = Categorie::all();
     
        return view('Admin.Divers.partenaire_index', compact('categories', 'formations'));
    }

     public function index_email()
    {
        $formations = Formation::with('categorie')->get();
        $categories = Categorie::all();
     
        return view('Admin.Email.index', compact('categories', 'formations'));
    }

    // 

  


}
