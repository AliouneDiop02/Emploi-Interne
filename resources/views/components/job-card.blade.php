@props(['offre'])

<div class="bg-white border border-bleu-clair border-l-4 border-l-bleu-vif rounded-2xl p-5 shadow-sm hover:shadow-md hover:border-bleu-moyen transition-all duration-200">

    {{-- En-tête : type d'emploi + date --}}
    <div class="flex items-center justify-between mb-3">
        <x-badge variant="type">{{ $offre->type_emploi }}</x-badge>
        @if($offre->date_publication)
            <span class="text-xs text-bleu-doux">
                {{ $offre->date_publication->format('d/m/Y') }}
            </span>
        @endif
    </div>

    {{-- Titre et entreprise --}}
    <h2 class="text-lg font-semibold text-bleu-texte mb-1">
        {{ $offre->titre }}
    </h2>
    <p class="text-bleu-doux text-sm mb-3">
        {{ $offre->entreprise }}
    </p>

    {{-- Ville + salaire --}}
    <div class="flex items-center gap-4 text-sm text-bleu-doux mb-4">
        @if($offre->ville)
            <span class="flex items-center gap-1">
                <span>📍</span> {{ $offre->ville }}
            </span>
        @endif
        @if($offre->salaire)
            <span class="flex items-center gap-1">
                <span>💰</span> {{ $offre->salaire }}
            </span>
        @endif
    </div>

    {{-- Pied de carte --}}
    <div class="flex items-center justify-between pt-3 border-t border-bleu-clair">
        <a href="{{ route('emplois.show', $offre) }}"
           class="text-sm text-bleu-doux hover:text-bleu-texte transition">
            Voir les détails →
        </a>
        <a href="{{ route('candidatures.create', $offre) }}">
            <x-button variant="primary">Postuler</x-button>
        </a>
    </div>

</div>
