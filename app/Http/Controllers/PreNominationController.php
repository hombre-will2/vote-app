<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreNomination;

class PreNominationController extends Controller

{
    /**
     * Affiche le formulaire de pré-nomination
     */
    public function index()
    {
        return view('pre-nominations');
            
    }

    /**
     * Traite la soumission du formulaire de pré-nomination
     */
    public function submit(Request $request)
    {
        // ✅ Valider les données reçues
        $request->validate([
            'nom_artiste'     => 'required|string|max:255',
            'lien'            => 'required|url',
            'categorie'       => 'required|string|max:255',
            'motivation'      => 'required|string',
            'nom_proposant'   => 'nullable|string|max:255',
            'contact'         => 'nullable|string|max:255',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // ✅ Récupérer les données
        $data = $request->only([
            'nom_artiste',
            'lien',
            'categorie',
            'motivation',
            'nom_proposant',
            'contact',
        ]);

        // ✅ Si une image est envoyée
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Enregistrer dans public/uploads/pre-nominations
            $image->move(public_path('uploads/pre-nominations'), $imageName);

            $data['image'] = $imageName;
        }

        // ✅ Créer l’enregistrement
        PreNomination::create($data);

        // ✅ Retour avec message de succès
        return back()->with('success', 'Votre proposition a bien été enregistrée. Merci pour votre contribution !');
    }

   }
