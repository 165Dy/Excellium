<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formationsController extends Controller
{
    public function index()
    {
        return view('Admin.Formations.index');
    }

    public function create()
    {
        return view('Admin.Formations.create');
    }

    public function store(Request $request)
    {
        // logiquement ici tu traites la sauvegarde
        return redirect()->route('formations.index');
    }

    public function show($id)
    {
        return view('Admin.Formations.show', compact('id'));
    }

    public function edit($id)
    {
        return view('Admin.Formations.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // logiquement ici tu traites la mise à jour
        return redirect()->route('formations.index');
    }

    public function destroy($id)
    {
        // logiquement ici tu supprimes l'élément
        return redirect()->route('formations.index');
    }
}