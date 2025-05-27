<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class InscriptionController extends Controller
{
    public function inscriptionAjax(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'email'     => ['required', 'email', Rule::unique('users', 'email')],
            'nom'       => 'required|string|max:50',
            'prenom'    => 'required|string|max:50',
            'telephone' => 'nullable|string|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Erreur de validation : " . implode(' ', $validator->errors()->all())
            ]);
        }

        // Création utilisateur (mot de passe null)
        $user = User::create([
            'email'     => $request->email,
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'telephone' => $request->telephone,
            'type'      => 'participant', // par défaut
            'password'  => null
        ]);

        return response()->json(['success' => true]);
    }

    public function choixService()
    {
        return view('choix-service');
    }
}
