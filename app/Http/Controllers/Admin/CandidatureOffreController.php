<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OffreEmploi;
use Illuminate\View\View;

class CandidatureOffreController extends Controller
{
     public function index(OffreEmploi $offreEmploi): View
    {
        $candidatures = $offreEmploi->candidatures()
            ->latest()
            ->get();

        return view('admin.offres.candidatures', compact('offreEmploi', 'candidatures'));
    }
}
