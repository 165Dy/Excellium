<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('modal_index', compact('categories'));
    }
}
