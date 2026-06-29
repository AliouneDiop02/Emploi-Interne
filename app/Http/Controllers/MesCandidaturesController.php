<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MesCandidaturesController extends Controller
{
    public function index(): View
    {
        $candidatures = auth()->user()
            ->candidatures()
            ->with('offreEmploi')
            ->latest()
            ->paginate(10);

        return view('candidatures.mes-candidatures', compact('candidatures'));
    }

     public function show(int $id): View
    {
        $candidature = auth()->user()
            ->candidatures()
            ->with('offreEmploi')
            ->findOrFail($id);

        return view('candidatures.show', compact('candidature'));
    }
    public function edit(int $id): View
    {
        $candidature = auth()->user()
            ->candidatures()
            ->with('offreEmploi')
            ->findOrFail($id);

        return view('candidatures.edit', compact('candidature'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $candidature = auth()->user()
            ->candidatures()
            ->findOrFail($id);

        $validated = $request->validate([
            'telephone' => ['nullable', 'string', 'max:50'],
            'message'   => ['nullable', 'string', 'max:2000'],
            'cv'        => ['nullable', 'file', 'max:2048', 'extensions:pdf,doc,docx,txt,rtf,odt'],
        ]);

        // Si un nouveau CV est téléversé
        if ($request->hasFile('cv')) {
            $fichier = $request->file('cv');
            $validated['cv_chemin']       = $fichier->store('cvs', 'local');
            $validated['cv_nom_original'] = $fichier->getClientOriginalName();
            $validated['cv_type_mime']    = $fichier->getMimeType();
            $validated['cv_taille']       = $fichier->getSize();
        }

        unset($validated['cv']); // retire le fichier brut avant update
        $candidature->update($validated);

        return redirect()
            ->route('mes-candidatures')
            ->with('success', 'Votre candidature a été mise à jour.');
    }

    public function destroy(int $id)
    {
        $candidature = auth()->user()
            ->candidatures()
            ->findOrFail($id);

        $candidature->delete();

        return redirect()
            ->route('mes-candidatures')
            ->with('success', 'Votre candidature a été retirée.');
    }
}
