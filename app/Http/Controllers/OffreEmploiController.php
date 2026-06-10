<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use Illuminate\View\View;

class OffreEmploiController extends Controller
{
    public function index(): View
    {
        $offres = OffreEmploi::where('est_active', true)
            ->latest()
            ->get();

        return view('emplois.index', compact('offres'));
    }

    public function show(OffreEmploi $offreEmploi): View
    {
        abort_unless($offreEmploi->est_active, 404);

        return view('emplois.show', compact('offreEmploi'));
    }
}
