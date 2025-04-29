<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FiscalController extends Controller
{
    public function index()
    {
        return view('Admin.Formations.Fiscal.index');
    }

    public function create()
    {
        return view('Admin.Formations.Fiscal.create');
    }

    public function store(Request $request)
    {
        // logiquement ici tu traites la sauvegarde
        return redirect()->route('fiscal.index');
    }

    public function show($id)
    {
        return view('Admin.Formations.Fiscal.show', compact('id'));
    }

    public function edit($id)
    {
        return view('Admin.Formations.Fiscal.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // logiquement ici tu traites la mise à jour
        return redirect()->route('fiscal.index');
    }

    public function destroy($id)
    {
        // logiquement ici tu supprimes l'élément
        return redirect()->route('fiscal.index');
    }
}
