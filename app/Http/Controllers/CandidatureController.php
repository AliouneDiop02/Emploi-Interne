<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidatureController extends Controller
{
    public function create(OffreEmploi $offreEmploi): View
    {
        abort_unless($offreEmploi->est_active, 404);

        return view('candidatures.create', compact('offreEmploi'));
    }

    public function store(Request $request, OffreEmploi $offreEmploi)
    {
        abort_unless($offreEmploi->est_active, 404);

        $validated = $request->validate([
            'prenom'    => ['required', 'string', 'max:100'],
            'nom'       => ['required', 'string', 'max:100'],
            'courriel'  => ['required', 'email', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:50'],
            'message'   => ['nullable', 'string', 'max:2000'],
            'cv'        => ['required', 'file', 'max:2048', 'extensions:pdf,doc,docx,txt,rtf,odt'],
        ]);

        $fichier = $request->file('cv');
        $chemin  = $fichier->store('cvs', 'local');

        $offreEmploi->candidatures()->create([
            'prenom'          => $validated['prenom'],
            'nom'             => $validated['nom'],
            'courriel'        => $validated['courriel'],
            'telephone'       => $validated['telephone'] ?? null,
            'message'         => $validated['message'] ?? null,
            'cv_chemin'       => $chemin,
            'cv_nom_original' => $fichier->getClientOriginalName(),
            'cv_type_mime'    => $fichier->getMimeType(),
            'cv_taille'       => $fichier->getSize(),
            'statut'          => 'nouvelle',
        ]);

        return redirect()
            ->route('emplois.show', $offreEmploi)
            ->with('success', 'Votre candidature a été envoyée.');
    }
}
