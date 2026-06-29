<x-layout title="Détail de ma candidature">

    <div class="mb-6">
        <a href="{{ route('mes-candidatures') }}"
           class="inline-flex items-center gap-2 text-sm text-bleu-doux hover:text-bleu-texte transition">
            ← Retour à mes candidatures
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">
            <x-panel>
                <x-page-header
                    title="Détail de ma candidature"
                    :description="'Postulé le ' . $candidature->created_at->format('d/m/Y')"
                />

                <div class="flex flex-col gap-4 text-sm">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-bleu-doux mb-1">Prénom</p>
                            <p class="text-bleu-texte font-medium">{{ $candidature->prenom }}</p>
                        </div>
                        <div>
                            <p class="text-bleu-doux mb-1">Nom</p>
                            <p class="text-bleu-texte font-medium">{{ $candidature->nom }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-bleu-doux mb-1">Courriel</p>
                        <p class="text-bleu-texte font-medium">{{ $candidature->courriel }}</p>
                    </div>

                    @if($candidature->telephone)
                        <div>
                            <p class="text-bleu-doux mb-1">Téléphone</p>
                            <p class="text-bleu-texte font-medium">{{ $candidature->telephone }}</p>
                        </div>
                    @endif

                    @if($candidature->message)
                        <div>
                            <p class="text-bleu-doux mb-1">Message de motivation</p>
                            <p class="text-bleu-texte">{{ $candidature->message }}</p>
                        </div>
                    @endif

                    <div>
                        <p class="text-bleu-doux mb-1">CV soumis</p>
                        <p class="text-bleu-texte font-medium">
                            📄 {{ $candidature->cv_nom_original }}
                        </p>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-bleu-clair flex justify-between items-center">
                    <x-badge :variant="match($candidature->statut) {
                        'nouvelle' => 'type',
                        'vue'      => 'active',
                        'retenue'  => 'active',
                        'refusée'  => 'inactive',
                        default    => 'type'
                    }">
                        {{ ucfirst($candidature->statut) }}
                    </x-badge>

                    <form method="POST"
                          action="{{ route('mes-candidatures.destroy', $candidature->id) }}"
                          onsubmit="return confirm('Retirer cette candidature ?')">
                        @csrf
                        @method('DELETE')
                        <x-button variant="danger" type="submit">Retirer ma candidature</x-button>
                    </form>
                </div>
            </x-panel>
        </div>

        <div>
            <x-panel>
                <h3 class="text-sm font-semibold text-bleu-texte mb-4 uppercase tracking-wide">
                    Offre concernée
                </h3>
                <p class="text-bleu-texte font-bold text-lg mb-1">
                    {{ $candidature->offreEmploi->titre }}
                </p>
                <p class="text-bleu-doux text-sm mb-4">
                    {{ $candidature->offreEmploi->entreprise }}
                </p>
                <a href="{{ route('emplois.show', $candidature->offreEmploi) }}"
                   class="text-sm text-bleu-doux hover:text-bleu-texte transition">
                    Voir l'offre →
                </a>
            </x-panel>
        </div>

    </div>

</x-layout>
