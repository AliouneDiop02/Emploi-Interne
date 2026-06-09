<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidature extends Model
{
    protected $table = 'candidatures';

    protected $fillable = [
        'offre_emploi_id',
        'prenom',
        'nom',
        'courriel',
        'telephone',
        'message',
        'cv_chemin',
        'cv_nom_original',
        'cv_type_mime',
        'cv_taille',
        'statut',
    ];

    public function offreEmploi(): BelongsTo
    {
        return $this->belongsTo(OffreEmploi::class);
    }
}
