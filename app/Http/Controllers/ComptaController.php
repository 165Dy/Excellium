<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComptaController extends Controller
{
    public function index()
    {
        return view('Admin.Formations.Compta.index');
    }

    public function create()
    {
        return view('Admin.Formations.Compta.create');
    }

    public function store(Request $request)
    {
        // logiquement ici tu traites la sauvegarde
        return redirect()->route('compta.index');
    }

    public function show($id)
    {
        return view('Admin.Formations.Compta.show', compact('id'));
    }

    public function edit($id)
    {
        return view('Admin.Formations.Compta.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // logiquement ici tu traites la mise à jour
        return redirect()->route('compta.index');
    }

    public function destroy($id)
    {
        // logiquement ici tu supprimes l'élément
        return redirect()->route('compta.index');
    }
}
