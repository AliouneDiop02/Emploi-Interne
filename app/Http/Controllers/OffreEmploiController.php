<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use Illuminate\View\View;

class OffreEmploiController extends Controller
{
    public function index(): View
    {
        $parPage = in_array(request('par_page'), [10, 25, 50])
        ? request('par_page')
        : 10;

        $offres = OffreEmploi::where('est_active', true)
            ->latest()
            ->paginate($parPage)
            ->withQueryString();

        return view('emplois.index', compact('offres', 'parPage'));
    }

    public function show(OffreEmploi $offreEmploi): View
    {
        abort_unless($offreEmploi->est_active, 404);

        return view('emplois.show', compact('offreEmploi'));
    }
}
