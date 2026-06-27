<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OffreEmploi extends Model
{
    use HasFactory;

    protected $table = 'offres_emploi';

    protected $fillable = [
        'titre',
        'entreprise',
        'ville',
        'type_emploi',
        'salaire',
        'description',
        'responsabilites',
        'exigences',
        'est_active',
        'date_publication',
    ];

    protected $casts = [
        'est_active'       => 'boolean',
        'date_publication' => 'date',
    ];

    public function candidatures(): HasMany
    {
        return $this->hasMany(Candidature::class);
    }
}
