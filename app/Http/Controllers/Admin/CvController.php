<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function show(Candidature $candidature)
    {
        abort_unless(Storage::disk('local')->exists($candidature->cv_chemin), 404);

       return response()->download(
        storage_path('app/private/' . $candidature->cv_chemin), $candidature->cv_nom_original);
    }
}
