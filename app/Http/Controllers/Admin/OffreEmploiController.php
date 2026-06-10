<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OffreEmploiController extends Controller
{
    public function index(): View
    {
        $offres = OffreEmploi::withCount('candidatures')
            ->latest()
            ->get();

        return view('admin.offres.index', compact('offres'));
    }

    public function create(): View
    {
        return view('admin.offres.create');
    }

    public function store(Request $request)
    {
        OffreEmploi::create($this->validatedData($request));

        return redirect()
            ->route('admin.offres.index')
            ->with('success', 'Offre ajoutée avec succès.');
    }

    public function edit(OffreEmploi $offreEmploi): View
    {
        return view('admin.offres.edit', compact('offreEmploi'));
    }

    public function update(Request $request, OffreEmploi $offreEmploi)
    {
        $offreEmploi->update($this->validatedData($request));

        return redirect()
            ->route('admin.offres.index')
            ->with('success', 'Offre modifiée avec succès.');
    }

    public function destroy(OffreEmploi $offreEmploi)
    {
        $offreEmploi->delete();

        return redirect()
            ->route('admin.offres.index')
            ->with('success', 'Offre supprimée avec succès.');
    }

    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'titre'           => ['required', 'string', 'max:255'],
            'entreprise'      => ['required', 'string', 'max:255'],
            'ville'           => ['nullable', 'string', 'max:255'],
            'type_emploi'     => ['required', 'string', 'max:100'],
            'salaire'         => ['nullable', 'string', 'max:255'],
            'description'     => ['nullable', 'string'],
            'responsabilites' => ['nullable', 'string'],
            'exigences'       => ['nullable', 'string'],
            'est_active'      => ['nullable', 'boolean'],
            'date_publication'=> ['nullable', 'date'],
        ]);

        $validated['est_active'] = $request->boolean('est_active');

        return $validated;
    }
}
