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
        $categories = Categorie::all();
        $formations = Formation::with('categorie')->latest()->get();
        return view('layouts.admin', compact('categories', 'formations'));
    }

    public function index_admin()
    {
        $categories = Categorie::all();
        $formations = Formation::with('categorie')->latest()->get();
        return view('dashboard', compact('categories', 'formations'));
    }
}
