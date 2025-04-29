<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        return view('Admin.Formations.Entreprise.index');
    }

    public function create()
    {
        return view('Admin.Formations.Entreprise.create');
    }

    public function store(Request $request)
    {
        // logiquement ici tu traites la sauvegarde
        return redirect()->route('entreprise.index');
    }

    public function show($id)
    {
        return view('Admin.Formations.Entreprise.show', compact('id'));
    }

    public function edit($id)
    {
        return view('Admin.Formations.Entreprise.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // logiquement ici tu traites la mise à jour
        return redirect()->route('entreprise.index');
    }

    public function destroy($id)
    {
        // logiquement ici tu supprimes l'élément
        return redirect()->route('entreprise.index');
    }
}
