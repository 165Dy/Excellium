<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Formation;

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
        return view('dashboard', compact('categories', 'formations'));
    }
}
